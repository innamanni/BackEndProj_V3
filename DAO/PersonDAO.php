<?php
require_once 'DAO/BaseDAO.php';

class PersonDAO extends BaseDAO{
	public static function getPersonDTO($tempID, $tempLname, $tempFname, $tempEmail){
		$personDTO = new PersonDTO($tempID, $tempLname, $tempFname, $tempEmail);
		return $personDTO;
	}
	
	private function __construct() {
		//$this->setCon($dbCon);
		//$this->setDTO($personDTO); 
		//$this->setID($personID); 
	}
	public static function createPerson($con, $dto) 
	{
			$person_id = "";
			$f_name = $dto->getFname();
			$l_name = $dto->getLname();
			$email_addr = $dto->getEmail();
			
			$stmt = $con->prepare("INSERT INTO person (l_name, f_name, email_addr) VALUES (:l_name, :f_name, :email_addr)");
			$stmt->bindParam(':l_name', $l_name);
			$stmt->bindParam(':f_name', $f_name);
			$stmt->bindParam(':email_addr', $email_addr);
			$stmt->execute();
			$person_id = $con->lastInsertId();

			return $person_id;
	}
	public static function loadPersonsList($con)
	{
		$personList = array();
		$sql = "select * from person;";
		foreach ($con->query($sql) as $row)
		{	
			$tempPersonDTO = PersonDAO::getPersonDTO($row['person_id'], $row['l_name'], $row['f_name'], $row['email_addr']);
			$personList[count($personList)] = $tempPersonDTO;
		}
		return $personList;
	}
	/*
	public static function readFullPersonList($con)
	{
		$personList = array();
		$sql = "select * from person, phone, phone_type, address where person.person_id = phone.person_id and phone.phone_type_id = phone_type.phone_type_id and person.person_id = address.person_id;";
		foreach ($con->query($sql) as $row)
		{	
			$tempAddressDTO = AddressDAO::getAddressDTO($row['street1'], $row['street2'], $row['city'], $row['state_id'], $row['zip'], $row['address_id'], $row['person_id']);
			$tempPhoneDTO = PhoneDAO::getPhoneDTO($row['phone_id'], $row['person_id'], $row['phone_type_id'], $row['phone_number'], $row['phone_type']);
			$tempPersonDTO = PersonDAO::getPersonDTO($row['person_id'], $row['l_name'], $row['f_name'], $row['email_addr'], $tempPhoneDTO,  $tempAddressDTO);
						
			$personList[count($personList)] = $tempPersonDTO;
		}
		return $personList;
	}
	*/
	public static function deletePerson($con, $person_id)
	{
		$numOfPersons = count($person_id);
		$sql_person = "delete from person where person_id in (";
		for ($i = 0; $i < $numOfPersons; $i++) {
				$sql_person .= ":id" . $i;
				if ($numOfPersons - $i > 1) {$sql_person .= ',';}
		}
		$sql_person .= ")";
		
		$stmt = $con->prepare($sql_person);
		
		for ($i = 0; $i < $numOfPersons; $i++) {
			$stmt->bindParam(':id' . $i, $person_id[$i]);
		}
		$stmt->execute();
		return $person_id;
	}
	public static function loadPerson($con, $person_id)
	{
		$sql = "select * from person where person.person_id = $person_id;";
		$stmt = $con->query($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$tempPersonDTO = PersonDAO::getPersonDTO($row['person_id'], $row['l_name'], $row['f_name'], $row['email_addr']);

		return $tempPersonDTO;
	}
	/*
	public static function getFullPerson($con, $person_id)
	{
		$sql = "select * from person, phone, phone_type, address where person.person_id = phone.person_id AND person.person_id = address.person_id AND phone.phone_type_id = phone_type.phone_type_id AND person.person_id = $person_id;";
		$stmt = $con->query($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$tempAddressDTO = AddressDAO::getAddressDTO($row['street1'], $row['street2'], $row['city'], $row['state_id'], $row['zip'], $row['address_id'], $row['person_id']);
		$tempPhoneDTO = PhoneDAO::getPhoneDTO($row['phone_id'], $row['person_id'], $row['phone_type_id'], $row['phone_number'], $row['phone_type']);
		$tempPersonDTO = PersonDAO::getPersonDTO($row['person_id'], $row['l_name'], $row['f_name'], $row['email_addr'], $tempPhoneDTO,  $tempAddressDTO);

		return $tempPersonDTO;
	}
	*/
	public static function updatePerson($con, $personDTO)
	{
		$person_id = $personDTO->getID();
		$f_name = $personDTO->getFname();
		$l_name = $personDTO->getLname();
		$email_addr = $personDTO->getEmail();
		$stmt = $con->prepare("UPDATE person SET f_name=:f_name, l_name=:l_name, email_addr=:email_addr WHERE person_id=$person_id");
		$stmt->bindParam(':f_name', $f_name);
		$stmt->bindParam(':l_name', $l_name);
		$stmt->bindParam(':email_addr', $email_addr);
		$stmt->execute();
		return $person_id;
	}
}
?>

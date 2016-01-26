<?php
require_once 'DAO/BaseDAO.php';
class PhoneDAO extends BaseDAO{
	var $con;
	var $dto;
	var $phone_number;
	var $person_id;
	var $phone_id;
	var $phone_type_id;
	var $phone_type;
	function getID()
	{
		return $this->person_id;
	}
	function setID($tempID)
	{
		$this->person_id=$tempID;
	}
	function getDTO()
	{
		return $this->dto;
	}
	function setDTO($tempDTO)
	{
		$this->dto=$tempDTO;
	}
	function getCon()
	{
		return $this->con;
	}
	function setCon($tempCon)
	{
		$this->con=$tempCon;
	}
	function __construct() {
		//$this->setCon($dbCon);
		//$this->setDTO($personDTO); 
		//$this->setID($personID); 
	}
	function createPhone($con, $dto) 
	{
			try {
				$f_name = $dto->getFname();
				$l_name = $dto->getLname();
				$email_addr = $dto->getEmail();
				$stmt = $con->prepare("INSERT INTO person (l_name, f_name, email_addr) VALUES (:l_name, :f_name, :email_addr)");
				$stmt->bindParam(':l_name', $l_name);
				$stmt->bindParam(':f_name', $f_name);
				$stmt->bindParam(':email_addr', $email_addr);
				$stmt->execute();
				//echo '<br><br>Hello from AddressDAO with PDO prepared statement<br><br>';
				$person_id = $con->lastInsertId();
				//echo 'person_id: ' . $person_id . '<br><br>';
				//var_dump($dto);
			}
			catch(PDOException $e)
			{
				//echo "Error: " . $e->getMessage();
			}
			return $person_id;
	}
	function readPhoneTypeList($con)
	{
		$phone_id = "";
		$person_id = "";
		$phone_number = "";
		$phoneTypeList = array();
		$sql = "select * from phone_type";
		foreach ($con->query($sql) as $row)
		{
			$phone_type_id = $row['phone_type_id'];
			$phone_type = $row['phone_type'];
			$tempPhoneDTO = new PhoneDTO($phone_id, $person_id, $phone_type_id, $phone_number, $phone_type);
			$phoneTypeList[count($phoneTypeList)] = $tempPhoneDTO;
		}
		return $phoneTypeList;
	}
	
	
	function readPersonList($con)
	{
		$personList = array();
		$sql = "SELECT * FROM person";
		foreach ($con->query($sql) as $row)
		{	
			$tempPersonDTO = new PersonDTO(
						$row['person_id'],
						$row['l_name'],
						$row['f_name'],
						$row['email_addr']);
			$personList[count($personList)] = $tempPersonDTO;
		}
		return $personList;
	}
	function deletePerson($con, $person_id)
	{
		$numOfPersons = count($person_id);
		$sql = "delete from person where person_id in (";
		for ($i = 0; $i < $numOfPersons; $i++) {
				$sql .= ":id" . $i;
				if ($numOfPersons - $i > 1) {$sql .= ',';}
			}
		{$sql .= ")";}
		try 
		{
			// delete from Persons where person_id in (0, 1, 2, 3);
			$stmt = $con->prepare($sql);
			for ($i = 0; $i < $numOfPersons; $i++) {
				$stmt->bindParam(':id' . $i, $person_id[$i]);
			}
			$stmt->execute();
			echo "Record deleted successfully";
		}
		catch(PDOException $e)
		{
			$sql = "<br>" . $e->getMessage();
		}
		return $sql;
	}
	function getPerson($con, $person_id)
	{
		$sql = "SELECT * FROM person where person_id=\"" . $person_id . "\"";
		foreach ($con->query($sql) as $row)
		{	
			$tempPersonDTO = new PersonDTO(
						$row['person_id'],
						$row['l_name'],
						$row['f_name'],
						$row['email_addr']);
		}
		return $tempPersonDTO;
	}
	function updatePerson($con, $dto)
	{
		//$sql = "UPDATE person SET 'column1'=value, column2=value2,... WHERE some_column=some_value";
		try {
				$f_name = $dto->getFname();
				$l_name = $dto->getLname();
				$email_addr = $dto->getEmail();
				$person_id = $dto->getID();
				$stmt = $con->prepare("UPDATE person SET f_name=:f_name, l_name=:l_name, email_addr=:email_addr, person_id=:person_id");
				$stmt->bindParam(':f_name', $f_name);
				$stmt->bindParam(':l_name', $l_name);
				$stmt->bindParam(':email_addr', $email_addr);
				$stmt->bindParam(':person_id', $person_id);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				//echo "Error: " . $e->getMessage();
			}
			return $person_id;
	}
}
?>

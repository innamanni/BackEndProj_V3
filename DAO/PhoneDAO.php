<?php
<<<<<<< HEAD
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
	public static function getPhoneDTO($tempPhoneID, $tempPersonID, $tempPhoneTypeID, $tempPhoneNum, $tempPhoneType){
		$tempPhoneDTO = new PhoneDTO($tempPhoneID, 
						$tempPersonID, 
						$tempPhoneTypeID, 
						$tempPhoneNum, 
						$tempPhoneType);
		return $tempPhoneDTO;
	}
	public static function createPhone($con, $dto) 
	{
			$person_id = $dto->getPersonID();
			$phone_id = "";
			$phone_number = $dto->getPhoneNum();
			$phone_type_id = $dto->getPhoneTypeID();
					
			$stmt = $con->prepare("INSERT INTO phone (phone_number, person_id, phone_type_id) VALUES (:phone_number, :person_id, :phone_type_id)");
			
			$stmt->bindParam(':phone_number', $phone_number);
			$stmt->bindParam(':person_id', $person_id);
			$stmt->bindParam(':phone_type_id', $phone_type_id);
			
			$stmt->execute();
			$phone_id = $con->lastInsertId();
			
			return $phone_id;
	}
	public static function readPhoneTypeList($con)
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
	public static function deletePhone($con, $person_id)
	{
		$numOfPersons = count($person_id);
		$sql_phone = "delete from phone where person_id in (";
		for ($i = 0; $i < $numOfPersons; $i++) {
				$sql_phone .= ":id" . $i;
				if ($numOfPersons - $i > 1) {$sql .= ',';}
		}
		$sql_phone .= ")";
		$stmt = $con->prepare($sql_phone);
		
		for ($i = 0; $i < $numOfPersons; $i++) {
			$stmt->bindParam(':id' . $i, $person_id[$i]);
		}
		$stmt->execute();
		echo "Record deleted successfully";
		return $sql_phone;
	}
	public static function updatePhone($con, $phoneDTO)
	{
		$person_id = $phoneDTO->getPersonID();
		$phone_number = $phoneDTO->getPhoneNum();
		$phone_type_id = $phoneDTO->getPhoneTypeID();
		$phone_id = $phoneDTO->getPhoneID();

		$stmt = $con->prepare("UPDATE phone SET phone_number=:phone_number, phone_id=:phone_id, phone_type_id=:phone_type_id WHERE person_id=$person_id");
		$stmt->bindParam(':phone_number', $phone_number);
		$stmt->bindParam(':phone_id', $phone_id);
		$stmt->bindParam(':phone_type_id', $phone_type_id);
		$stmt->execute();
	}
}
?>
=======
	function insertPhone($con, $person_id) {
			//table & column names
			$table_name = 'phone';
			$col_phone = 'phone_number';
			$col_person_id = 'person_id';
			
			$phone = $_POST['parentCell'];

			$query =  'INSERT INTO ' . $table_name . '(' . $col_phone . ',' . $col_person_id .') VALUES (\''. $phone . '\' ,\'' . $person_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			$phone_id = mysqli_insert_id( $con );
			
			return $phone_id;
		}
?>
>>>>>>> origin/master

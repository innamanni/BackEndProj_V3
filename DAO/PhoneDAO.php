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
}
?>

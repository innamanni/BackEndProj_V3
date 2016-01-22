<?php
require_once 'DAO/BaseDAO.php';
class PersonDAO extends BaseDAO{
	var $con;
	var $dto;
	var $person_id;
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
		//$this->setDTO($addrDTO); 
		//$this->setID($addrID); 
	}
	function createPerson($con, $dto) 
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
				//echo 'address_id: ' . $address_id . '<br><br>';
				//var_dump($dto);
			}
			catch(PDOException $e)
			{
				//echo "Error: " . $e->getMessage();
			}
			return $person_id;
	}
}
?>

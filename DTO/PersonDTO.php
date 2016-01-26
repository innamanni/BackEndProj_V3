<?php
require_once 'DTO/BaseDTO.php';
class PersonDTO extends BaseDTO
{
	var $person_id;
	var $f_name;
	var $l_name;
	var $email_addr;
	function getID()
	{
		return $this->person_id;
	}
	function setID($tempID)
	{
		$this->person_id=$tempID;
	}
	function getLname()
	{
		return $this->l_name;
	}
	function setLname($tempLname)
	{
		$this->l_name=$tempLname;
	}
	function getFname()
	{
		return $this->f_name;
	}
	function setFname($tempFname)
	{
		if ($tempFname != Null)
		$this->f_name=$tempFname;
	}
	function getEmail()
	{
		return $this->email_addr;
	}
	function setEmail($tempEmail)
	{
		$this->email_addr=$tempEmail;
	}
	function getPhoneDTO()
	{
		return $this->phoneDTO;
	}
	function setPhoneDTO($tempPhoneDTO)
	{
		$this->phoneDTO=$tempPhoneDTO;
	}
	function __construct($tempID, $tempLname, $tempFname, $tempEmail, $tempPhoneDTO)
	{
		$this->setID($tempID);
		$this->setLname($tempLname); 
		$this->setFname($tempFname); 
		$this->setEmail($tempEmail); 
		$this->setPhoneDTO($tempPhoneDTO);
	}
}
?>
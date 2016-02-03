<?php
require_once '../DTO/BaseDTO.php';
class PersonDTO extends BaseDTO
{
	// instance variables
	var $person_id;
	var $f_name;
	var $l_name;
	var $email_addr;
	
	function __construct($tempID, $tempLname, $tempFname, $tempEmail)
	{
		$this->setID($tempID);
		$this->setLname($tempLname); 
		$this->setFname($tempFname); 
		$this->setEmail($tempEmail); 
	}
	
	//Getters and Setters
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
		{
			$this->f_name=$tempFname;
		}
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
	function getAddrDTO()
	{
		return $this->addrDTO;
	}
	function setAddrDTO($tempAddrDTO)
	{
		$this->addrDTO=$tempAddrDTO;
	}
	
	// converts json to dto for self 
	public static function hydrateSelf($json_str)
	{
		if(!empty($json_str->{"f_name"})){$fname = $json_str->{"f_name"};}
		else{$fname = "";}
		if(!empty($json_str->{"l_name"})){$lname = $json_str->{"l_name"};}
		else{$lname = "";}
		if(!empty($json_str->{"email_addr"})){$email = $json_str->{"email_addr"};}
		else{$email = "";}
		if(!empty($json_str->{"person_id"})){$person_id = $json_str->{"person_id"};}
		else{$person_id = "";}
		$personDTO = new PersonDTO($person_id, $lname, $fname, $email);
		return $personDTO;
	}
}
?>
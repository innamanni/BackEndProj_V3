<?php
require_once 'DTO/BaseDTO.php';
class PersonDTO extends BaseDTO
{
	var $person_id;
	var $f_name;
	var $l_name;
	var $email_addr;
<<<<<<< HEAD
	public static function hidrateSelf($json_str){
		if(!empty($json_str->{"fname"})){$fname = $json_str->{"fname"};}
		else{$fname = "";}
		if(!empty($json_str->{"lname"})){$lname = $json_str->{"lname"};}
		else{$lname = "";}
		if(!empty($json_str->{"email"})){$email = $json_str->{"email"};}
		else{$email = "";}
		if(!empty($json_str->{"person_id"})){$person_id = $json_str->{"person_id"};}
		else{$person_id = "";}
		$personDTO = new PersonDTO($person_id, $lname, $fname, $email);
		return $personDTO;
	}
=======
	
>>>>>>> origin/master
	function getID()
	{
		return $this->person_id;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function setID($tempID)
	{
		$this->person_id=$tempID;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function getLname()
	{
		return $this->l_name;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function setLname($tempLname)
	{
		$this->l_name=$tempLname;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function getFname()
	{
		return $this->f_name;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function setFname($tempFname)
	{
		if ($tempFname != Null)
		$this->f_name=$tempFname;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function getEmail()
	{
		return $this->email_addr;
	}
<<<<<<< HEAD
=======
	
>>>>>>> origin/master
	function setEmail($tempEmail)
	{
		$this->email_addr=$tempEmail;
	}
<<<<<<< HEAD
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
=======
	
>>>>>>> origin/master
	function __construct($tempID, $tempLname, $tempFname, $tempEmail)
	{
		$this->setID($tempID);
		$this->setLname($tempLname); 
		$this->setFname($tempFname); 
		$this->setEmail($tempEmail); 
	}
}
?>
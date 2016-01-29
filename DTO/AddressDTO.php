<?php
require_once 'DTO/BaseDTO.php';
class AddressDTO extends BaseDTO
{
<<<<<<< HEAD
	//var $address_id = "";
	//var $person_id = "";
	var $street1;
	var $street2 = "";
	var $city;
	var $state_id;
	var $zip;
	//$tempStreet1, $tempStreet2, $tempCity, $tempStateID, $tempZip, $tempAddrID, $tempPersonID
	public static function hidrateSelf($json_str){
		if(!empty($json_str->{"street1"})){$street1 = $json_str->{"street1"};}
		else{$street1 = "";}
		if(!empty($json_str->{"street2"})){$street2 = $json_str->{"street2"};}
		else{$street2 = "";}
		if(!empty($json_str->{"city"})){$city = $json_str->{"city"};}
		else{$city = "";}
		if(!empty($json_str->{"state_id"})){$state_id = $json_str->{"state_id"};}
		else{$state_id = "";}
		if(!empty($json_str->{"zip"})){$zip = $json_str->{"zip"};}
		else{$zip = "";}
		if(!empty($json_str->{"address_id"})){$address_id = $json_str->{"address_id"};}
		else{$address_id = "";}
		if(!empty($json_str->{"person_id"})){$person_id = $json_str->{"person_id"};}
		else{$person_id = "";}
		$addressDTO = new AddressDTO($street1, $street2, $city, $state_id, $zip, $address_id, $person_id);
		return $addressDTO;
	}
	
	function getPersonID()
	{
		return $this->person_id;
	}
	
	function setPersonID($tempPersonID)
	{
		$this->person_id=$tempPersonID;
	}
	
	function getAddrID()
=======
	var $address_id;
	var $street1;
	var $street2 = "";
	var $city;
	var $state;
	var $zip;
	
	function getID()
>>>>>>> origin/master
	{
		return $this->address_id;
	}
	
<<<<<<< HEAD
	function setAddrID($tempAddrID)
	{
		$this->address_id=$tempAddrID;
=======
	function setID($tempID)
	{
		$this->address_id=$tempID;
>>>>>>> origin/master
	}
	
	function getStreet1()
	{
		return $this->street1;
	}
	
	function setStreet1($tempStreet1)
	{
		$this->street1=$tempStreet1;
	}
	
	function getStreet2()
	{
		return $this->street2;
	}
	
	function setStreet2($tempStreet2)
	{
		if ($tempStreet2 != Null)
		$this->street2=$tempStreet2;
	}
	
	function getCity()
	{
		return $this->city;
	}
	
	function setCity($tempCity)
	{
		$this->city=$tempCity;
	}
	
<<<<<<< HEAD
	function getStateID()
	{
		return $this->state_id;
	}
	
	function setStateID($tempStateID)
	{
		$this->state_id=$tempStateID;
=======
	function getState()
	{
		return $this->state;
	}
	
	function setState($tempState)
	{
		$this->state=$tempState;
>>>>>>> origin/master
	}
	
	function getZip()
	{
		return $this->zip;
	}
	
	function setZip($tempZip)
	{
		$this->zip=$tempZip;
	}
	
<<<<<<< HEAD
	function __construct($tempStreet1, $tempStreet2, $tempCity, $tempStateID, $tempZip, $tempAddrID, $tempPersonID)
	{
	    $this->setPersonID($tempPersonID);
		$this->setAddrID($tempAddrID);
		$this->setStreet1($tempStreet1); 
		$this->setStreet2($tempStreet2); 
		$this->setCity($tempCity); 
		$this->setStateID($tempStateID);
=======
	function __construct($tempStreet1, $tempStreet2, $tempCity, $tempState, $tempZip, $temp_ID)
	{
	    /*
	    echo "<br><br>hello from contructor! the variables are: " . 
				"<br>$tempStreet1: " . $tempStreet1 . 
				"<br>$tempStreet2: " . $tempStreet2 . 
				"<br>$tempCity: " . $tempCity . 
				"<br>$tempState: " . $tempState . 
				"<br>$tempZip: " . $tempZip . "<br><br>";
		*/
				
		$this->setID($temp_ID);
		$this->setStreet1($tempStreet1); 
		$this->setStreet2($tempStreet2); 
		$this->setCity($tempCity); 
		$this->setState($tempState);
>>>>>>> origin/master
		$this->setZip($tempZip);
	}
}
?>
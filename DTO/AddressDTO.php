<?php
class AddressDTO
{
	var $address_id;
	var $street1;
	var $street2 = "";
	var $city;
	var $state;
	var $zip;
	
	function getID()
	{
		return $this->address_id;
	}
	
	function setID($tempID)
	{
		$this->address_id=$tempID;
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
	
	function getState()
	{
		return $this->state;
	}
	
	function setState($tempState)
	{
		$this->state=$tempState;
	}
	
	function getZip()
	{
		return $this->zip;
	}
	
	function setZip($tempZip)
	{
		$this->zip=$tempZip;
	}
	
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
		$this->setZip($tempZip);
	}
}
?>
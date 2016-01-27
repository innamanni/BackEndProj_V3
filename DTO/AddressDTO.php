<?php
require_once 'DTO/BaseDTO.php';
class AddressDTO extends BaseDTO
{
	var $address_id = "";
	var $person_id = "";
	var $street1;
	var $street2 = "";
	var $city;
	var $state_id;
	var $zip;
	
	function getPersonID()
	{
		return $this->person_id;
	}
	
	function setPersonID($tempPersonID)
	{
		$this->pertson_id=$tempPersonID;
	}
	
	function getAddrID()
	{
		return $this->address_id;
	}
	
	function setAddrID($tempAddrID)
	{
		$this->address_id=$tempAddrID;
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
	
	function getStateID()
	{
		return $this->state_id;
	}
	
	function setStateID($tempStateID)
	{
		$this->state_id=$tempStateID;
	}
	
	function getZip()
	{
		return $this->zip;
	}
	
	function setZip($tempZip)
	{
		$this->zip=$tempZip;
	}
	
	function __construct($tempStreet1, $tempStreet2, $tempCity, $tempStateID, $tempZip, $tempAddrID, $tempPersonID)
	{
	    $this->setPersonID($tempPersonID);
		$this->setAddrID($tempAddrID);
		$this->setStreet1($tempStreet1); 
		$this->setStreet2($tempStreet2); 
		$this->setCity($tempCity); 
		$this->setStateID($tempStateID);
		$this->setZip($tempZip);
	}
}
?>
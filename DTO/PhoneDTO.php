<?php
require_once '../DTO/BaseDTO.php';
class PhoneDTO extends BaseDTO
{
	var $phone_number;
	var $person_id;
	var $phone_id;
	var $phone_type_id;
	var $phone_type;
	
	function __construct($tempPhoneID, $tempPersonID, $tempPhoneTypeID, $tempPhoneNum, $tempPhoneType)
	{
		$this->setPersonID($tempPersonID);
		$this->setPhoneID($tempPhoneID); 
		$this->setPhoneNum($tempPhoneNum); 
		$this->setPhoneTypeID($tempPhoneTypeID); 
		$this->setPhoneType($tempPhoneType); 
	}
	
	function getPhoneID()
	{
		return $this->phone_id;
	}
	function setPhoneID($tempPhoneID)
	{
		$this->phone_id=$tempPhoneID;
	}
	function getPersonID()
	{
		return $this->person_id;
	}
	function setPersonID($tempPersonID)
	{
		$this->person_id=$tempPersonID;
	}
	function getPhoneNum()
	{
		return $this->phone_number;
	}
	function setPhoneNum($tempPhoneNum)
	{
		$this->phone_number=$tempPhoneNum;
	}
	function getPhoneTypeID()
	{
		return $this->phone_type_id;
	}
	function setPhoneTypeID($tempPhoneTypeID)
	{
		$this->phone_type_id=$tempPhoneTypeID;
	}
	function getPhoneType()
	{
		return $this->phone_type;
	}
	function setPhoneType($tempPhoneType)
	{
		$this->phone_type=$tempPhoneType;
	}
	
	public static function hydrateSelf($json_str)
	{
		if(!empty($json_str->{"phone_id"})){$phone_id = $json_str->{"phone_id"};}
		else{$phone_id = "";}
		if(!empty($json_str->{"person_id"})){$person_id = $json_str->{"person_id"};}
		else{$person_id = "";}
		if(!empty($json_str->{"phone_type_id"})){$phone_type_id = $json_str->{"phone_type_id"};}
		else{$phone_type_id = "";}
		if(!empty($json_str->{"phone_number"})){$phone_number = $json_str->{"phone_number"};}
		else{$phone_number = "";}
		if(!empty($json_str->{"phone_type"})){$phone_type = $json_str->{"phone_type"};}
		else{$phone_type = "";}
		$phoneDTO = new PhoneDTO($phone_id, $person_id, $phone_type_id, $phone_number, $phone_type);
		return $phoneDTO;
	}
}
?>
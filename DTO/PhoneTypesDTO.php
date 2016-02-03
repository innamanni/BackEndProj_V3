<?php
require_once '../DTO/BaseDTO.php';
class PhoneTypesDTO extends BaseDTO
{
	var $phoneTypesList;
	var $message;
	
	function __construct($tempPhoneTypesList, $msg)
	{
		$this->setPhoneTypesList($tempPhoneTypesList); 
		$this->setMessage($msg);
	}
	
	function getPhoneTypesList()
	{
		return $this->phoneTypesList;
	}
	
	function setPhoneTypesList($tempPhoneTypesList)
	{
		$this->phoneTypesList=$tempPhoneTypesList;
	}
	
	function setMessage($msg)
	{
		$this->message=$msg;
	}
	
	function getMessage()
	{
		return $this->message;
	}
}
?>
<?php
require_once 'DTO/BaseDTO.php';
class PersonsDTO extends BaseDTO
{
	var $personList;
	var $message;
	
	function getPersonList()
	{
		return $this->personList;
	}
	
	function setPersonList($tempPersonList)
	{
		$this->personList=$tempPersonList;
	}
	
	function setMessage($msg)
	{
		$this->message=$msg;
	}
	
	function getMessage()
	{
		return $this->message;
	}
	
	function __construct($tempPersonList, $msg)
	{
		$this->setPersonList($tempPersonList); 
		$this->setMessage($msg);
	}
}
?>
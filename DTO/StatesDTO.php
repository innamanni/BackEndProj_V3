<?php
require_once 'DTO/BaseDTO.php';
class StatesDTO extends BaseDTO
{
	var $statesList;
	var $message;
	
	public static function hidrateSelf($json_str){}
	
	function getStatesList()
	{
		return $this->statesList;
	}
	
	function setStatesList($tempStatesList)
	{
		$this->statesList=$tempStatesList;
	}
	
	function setMessage($msg)
	{
		$this->message=$msg;
	}
	
	function getMessage()
	{
		return $this->message;
	}
	
	function __construct($tempStatesList, $msg)
	{
		$this->setStatesList($tempStatesList); 
		$this->setMessage($msg);
	}
}
?>
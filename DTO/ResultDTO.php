<?php
require_once '../DTO/BaseDTO.php';
class ResultDTO extends BaseDTO
{
	var $result;
	var $message;
	
	function __construct($tempResult, $action)
	{
		$this->setResult($tempResult); 
		$this->setMessage($action);
	}
	
	function getResult()
	{
		return $this->result;
	}
	
	function setResult($tempResult)
	{
		$this->result=$tempResult;
	}
	
	function setMessage($action)
	{
		$this->message=$action;
	}
	
	function getMessage()
	{
		return $this->message;
	}
}
?>
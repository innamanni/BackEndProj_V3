<?php
require_once '../DTO/BaseDTO.php';
class StateDTO extends BaseDTO
{
	var $id;
	var $abbr;
	var $descr;
	
	function __construct($state_id, $state_abbr, $state_descr)
	{
		$this->setID($state_id);
		$this->setAbbr($state_abbr);
		$this->setDescr($state_descr);
	}
	
	function getID()
	{
		return $this->id;
	}
	
	function setID($temp_id)
	{
		$this->id=$temp_id;
	}
	
	function getAbbr()
	{
		return $this->abbr;
	}
	
	function setAbbr($temp_abbr)
	{
		$this->abbr=$temp_abbr;
	}
	
	function getDescr()
	{
		return $this->descr;
	}
	
	function setDescr($temp_descr)
	{
		$this->descr=$temp_descr;
	}
}
?>
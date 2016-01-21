<?php
require_once 'DTO/BaseDTO.php';
class StateDTO extends BaseDTO
{
	var $id;
	var $abbr;
	var $descr;
	
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

	
	function __construct($state_id, $state_abbr, $state_descr)
	{
		$this->setID($state_id);
		$this->setAbbr($state_abbr);
		$this->setDescr($state_descr);
		
		/*
		if ($descr == 'id') {
			$this->setID($val);
			$state_query = "SELECT abbr FROM state WHERE state_id=\"" . $val . "\"";
			$state_abbr = $con->query($state_query);
			$this->setAbbr($state_abbr);
		}
		else {
			$this->setAbbr($val);
			$state_query = "SELECT state_id FROM state WHERE abbr=\"" . $val . "\"";
			$state_id = $con->query($state_query);
			$this->setID($state_id);
		}
		*/
	}
}
?>
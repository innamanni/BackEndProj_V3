<?php
class Database {

	private $servername;
	private $username;
	private $password;
	private $dbname;
	
	public function __construct ($sname, $uname, $pword, $db) 
	{
		$this->setServername($sname);
		$this->setUsername($uname);
		$this->setPassword($pword);
		$this->setDBname($db);
	}
	
	function db_connect() 
	{
		try {
			$link = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e)
		{
			$link = "Error: " . $e->getMessage();
		}
		return $link;
	}
	
	function db_close($link) {
		$link = null;
	}
	
	function getServername()
	{
		return $this->servername;
	}
	
	function setServername($sname)
	{
		$this->servername=$sname;
	}
	
	function getUsername()
	{
		return $this->username;
	}
	
	function setUsername($uname)
	{
		$this->username=$uname;
	}
	
	function getPassword()
	{
		return $this->password;
	}
	
	function setPassword($pword)
	{
		$this->password=$pword;
	}
	
	function getDBname()
	{
		return $this->dbname;
	}
	
	function setDBname($db)
	{
		$this->dbname=$db;
	}
}
?>
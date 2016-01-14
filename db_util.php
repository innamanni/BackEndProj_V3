<?php
class Database {
	private $servername;
	private $username;
	private $password;
	private $dbname;
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
	public function __construct ($sname, $uname, $pword, $db) {
		$this->setServername($sname);
		$this->setUsername($uname);
		$this->setPassword($pword);
		$this->setDBname($db);
	}
	function db_connect() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mannitechcorp";
		try {
			$link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e)
		{
			//echo "Error: " . $e->getMessage();
		}
		return $link;
	}
	function db_close($link) {
		$link = null;
	}
}
?>
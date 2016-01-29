<?php
class ProgramManager
{
	const SERVERNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "mannitechcorp";
	function openConn(){
		$this->db = new Database(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
<<<<<<< HEAD
		$this->db_con = $this->db->db_connect();
	}
	function createPerson($tempPersonDTO) {
		try{
			self::openConn();
			$this->db_con->beginTransaction();
			$person_id = PersonDAO::createPerson($this->db_con, $tempPersonDTO);
			//CHECK HERE IF DTOs ARE EMPTY???
			$phoneDTO = $tempPersonDTO->getPhoneDTO();
			$phoneDTO->setPersonID($person_id);
			$addressDTO = $tempPersonDTO->getAddrDTO();
			$addressDTO->setPersonID($person_id);
			$phone_id = PhoneDAO::createPhone($this->db_con, $phoneDTO);
			$address_id = AddressDAO::createAddress($this->db_con, $addressDTO);
			$return = new PersonsDTO($person_id, "CREATED");
			$this->db_con->commit();
			self::closeConn();
			return $return;
		}
		catch(PDOException $e)
		{
			$this->db_con->rollBack();
		}
	}
	function loadAllPersons(){
	    self::openConn();
		$personList = PersonDAO::readPersonList($this->db_con);
		$personListDTO = new PersonsDTO($personList, "READ");
		self::closeConn();
		return $personListDTO;
	}
	function deletePerson($person_id) {
		self::openConn();
		$this->db_con->beginTransaction();
		try 
		{
			PhoneDAO::deletePhone($this->db_con, $person_id);
			AddressDAO::deleteAddress($this->db_con, $person_id);
			$result = PersonDAO::deletePerson($this->db_con, $person_id);
			$return = new ResultDTO($result, "DELETED");
			$json = json_encode($return);
			echo $json;
			$this->db_con->commit();
			self::closeConn();
		}
		catch(PDOException $e)
		{
			$sql_phone = "<br>" . $e->getMessage();
			$this->db_con->rollBack();
		}
	}
	function updatePerson($personID){
		self::openConn();
		$result = PersonDAO::getPerson($this->db_con, $personID);
		$return = new ResultDTO($result, "DISPLAYED");
		$json = json_encode($return);
		echo $json;
		self::closeConn();
	}
	function updatePersonRecord($personDTO){
		self::openConn();
		$this->db_con->beginTransaction();
		try {
			AddressDAO::updateAddress($this->db_con, $personDTO->getAddrDTO());
			PhoneDAO::updatePhone($this->db_con, $personDTO->getPhoneDTO());
			$person_id = PersonDAO::updatePerson($this->db_con, $personDTO);
			$return = new ResultDTO($person_id, "UPDATED");
			$json = json_encode($return);
			echo $json;
			$this->db_con->commit();
			self::closeConn();
		}
		catch(PDOException $e)
		{
			$person_id = "person insert Error: " . $e->getMessage();
			$this->db_con->rollBack();
		}
	}/*
	function getPhoneTypes(){
		self::openConn();
		$this->phoneDAO = new PhoneDAO();
		$phoneTypeList = $this->phoneDAO->readPhoneTypeList($this->db_con);
		$json = json_encode($phoneTypeList);
		echo $json;
		self::closeConn();
	}
	
	function createAddr($tempAddressDTO) {
		$this->addr_dto = $tempAddressDTO;
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->createAddress($this->db_con, $tempAddressDTO);
=======
		$this->con = $this->db->db_connect();
	}
	function createPerson($tempPersonDTO) {
		$this->person_dto = $tempPersonDTO;
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->createPerson($this->con, $tempPersonDTO);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	
	
	
	
	function createAddr($tempAddressDTO) {
		$this->addr_dto = $tempAddressDTO;
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->createAddress($this->con, $tempAddressDTO);
>>>>>>> origin/master
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	
	function deleteAddr($address_id) {
		$this->addrDAO = new AddressDAO();
<<<<<<< HEAD
		$result = $this->addrDAO->deleteAddress($this->db_con, $address_id);
=======
		$result = $this->addrDAO->deleteAddress($this->con, $address_id);
>>>>>>> origin/master
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function readAddr(){
		$this->addrDAO = new AddressDAO();
<<<<<<< HEAD
		$result = $this->addrDAO->readAddressList($this->db_con);
=======
		$result = $this->addrDAO->readAddressList($this->con);
>>>>>>> origin/master
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function updateAddr($addrID){
		$this->addrDAO = new AddressDAO();
<<<<<<< HEAD
		$result = $this->addrDAO->getAddress($this->db_con, $addrID);
=======
		$result = $this->addrDAO->getAddress($this->con, $addrID);
>>>>>>> origin/master
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function updateAddrRecord($addrDTO){
		$this->addrDAO = new AddressDAO();
<<<<<<< HEAD
		$result = $this->addrDAO->updateAddress($this->db_con, $addrDTO);
=======
		$result = $this->addrDAO->updateAddress($this->con, $addrDTO);
>>>>>>> origin/master
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
<<<<<<< HEAD
	*/
	function getState(){
	    self::openConn();
		$stateList = StateDAO::readStateList($this->db_con);
		self::closeConn();
		return $stateList;
	}

	function closeConn() {
		$this->db->db_close($this->db_con);
	}

=======
	function getState(){
		$stateList = readStateList($this->con);
		$json = json_encode($stateList);
		echo $json;
	}
	function closeConn() {
		$this->db->db_close($this->con);
	}
>>>>>>> origin/master
}
?>

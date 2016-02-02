<?php
/**
 * 
 **/
class ProgramManager
{
	const SERVERNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "mannitechcorp";
	
	function openConn(){
		$this->db = new Database(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
		$this->con = $this->db->db_connect();
	}
	
	function createPerson($tempPersonDTO) {
		$return = null;
		self::openConn();
		
		try{
			$this->con->beginTransaction();
			$person_id = PersonDAO::createPerson($this->con, $tempPersonDTO);
			$phoneDTO = $tempPersonDTO->getPhoneDTO();
			$phoneDTO->setPersonID($person_id);
			$addressDTO = $tempPersonDTO->getAddrDTO();
			$addressDTO->setPersonID($person_id);
			$phone_id = PhoneDAO::createPhone($this->con, $phoneDTO);
			$address_id = AddressDAO::createAddress($this->con, $addressDTO);
			$return = new PersonsDTO($person_id, "CREATED");
			$this->con->commit();
			
		}
		catch(PDOException $e)
		{
			$this->con->rollBack();
		}
		self::closeConn();
		return $return;	
	}
	
	function loadPersonDetails($personID){
		self::openConn();
		try 
		{
			$personDTO = PersonDAO::getPersonDTO($personID, "", "", "");
			$phoneDTO = PhoneDAO::loadPhone($this->con, $personID);
			$addressDTO = AddressDAO::loadAddress($this->con, $personID);
			$personDTO->setPhoneDTO($phoneDTO);
			$personDTO->setAddrDTO($addressDTO);
		}catch(PDOException $e){ /* guarantees db con close */}
		self::closeConn();
		return $personDTO;
	}
	function loadAllPersons(){
	    self::openConn();
		$personList = PersonDAO::loadPersonsList($this->con);
		$personListDTO = new PersonsDTO($personList, "READ");
		self::closeConn();
		return $personListDTO;
	}
	function deletePerson($person_id) {
		self::openConn();
		$this->con->beginTransaction();
		try 
		{
			PhoneDAO::deletePhone($this->con, $person_id);
			AddressDAO::deleteAddress($this->con, $person_id);
			$result = PersonDAO::deletePerson($this->con, $person_id);
			$return = new ResultDTO($result, "DELETED");
			$json = json_encode($return);
			echo $json;
			$this->con->commit();
			self::closeConn();
		}
		catch(PDOException $e)
		{
			$error_msg = $e->getMessage();
			$this->con->rollBack();
		}
	}
	function loadOnePerson($personID){
		self::openConn();
		$personDTO = PersonDAO::loadPerson($this->con, $personID);
		$phoneDTO = PhoneDAO::loadPhone($this->con, $personID);
		$addressDTO = AddressDAO::loadAddress($this->con, $personID);
		$personDTO->setPhoneDTO($phoneDTO);
		$personDTO->setAddrDTO($addressDTO);
		$json = json_encode($personDTO);
		echo $json;
		self::closeConn();
	}
	function updatePersonRecord($personDTO){
		self::openConn();
		$this->con->beginTransaction();
		try {
			AddressDAO::updateAddress($this->con, $personDTO->getAddrDTO());
			PhoneDAO::updatePhone($this->con, $personDTO->getPhoneDTO());
			$person_id = PersonDAO::updatePerson($this->con, $personDTO);
			$return = new ResultDTO($person_id, "UPDATED");
			$json = json_encode($return);
			echo $json;
			$this->con->commit();
			self::closeConn();
		}
		catch(PDOException $e)
		{
			$person_id = "person insert Error: " . $e->getMessage();
			$this->con->rollBack();
		}
	}
	function getStateList(){
		self::openConn();
		$stateList = StateDAO::readStateList($this->con);
		//$statesDTO = new StatesDTO($stateList, "states list");
		self::closeConn();
		return $stateList;
	}
	function getPhoneTypes(){
		self::openConn();
		$this->phoneDAO = new PhoneDAO();
		$phoneTypeList = $this->phoneDAO->readPhoneTypeList($this->con);
		self::closeConn();
		return $phoneTypeList;
	}
	/*
	function createAddr($tempAddressDTO) {
		$this->addr_dto = $tempAddressDTO;
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->createAddress($this->con, $tempAddressDTO);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	
	function deleteAddr($address_id) {
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->deleteAddress($this->con, $address_id);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function readAddr(){
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->readAddressList($this->con);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function updateAddr($addrID){
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->getAddress($this->con, $addrID);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function updateAddrRecord($addrDTO){
		$this->addrDAO = new AddressDAO();
		$result = $this->addrDAO->updateAddress($this->con, $addrDTO);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}

	*/
	function closeConn() {
		$this->db->db_close($this->con);
	}

}
?>

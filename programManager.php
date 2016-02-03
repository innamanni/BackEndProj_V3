<?php
/**
 * Orchestrates data collection from DAOs
 * Is the pass-through point for all controllers
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
	
	/*
	 * opens connection to the db
	 * begins new db transaction
	 *
	 * makes call to person DAO's method that will
	 * write data from person DTO into person table
	 * and return the person id
	 *
	 * takes the person id and 
	 * makes call to phone DAO's method that will
	 * write data from phone DTO into phone table
	 * and return the phone id
	 *
	 * takes the person id and 
	 * makes call to address DAO's method that will
	 * write data from address DTO into address table
	 * and return the address id
	 * 
	 * creates a persons DTO to return
	 * commits or rolls back db transaction
	 * and closes db connection
	 */
	function createPerson($personDTO) {
		self::openConn();
		
		try{
			$this->con->beginTransaction();
			$person_id = PersonDAO::createPerson($this->con, $personDTO);
			$phoneDTO = $personDTO->getPhoneDTO();
			$phoneDTO->setPersonID($person_id);
			$addressDTO = $personDTO->getAddrDTO();
			$addressDTO->setPersonID($person_id);
			$phone_id = PhoneDAO::createPhone($this->con, $phoneDTO);
			$address_id = AddressDAO::createAddress($this->con, $addressDTO);
			$return = new PersonsDTO($person_id, "CREATED");
			$this->con->commit();
		}
		catch(PDOException $e)
		{
			$this->con->rollBack();
			$return = NULL;
		}
		self::closeConn();
		return $return;	
	}
	
	/*
	 * opens connection to the db
	 *
	 * makes call to person DAO's method that will
	 * return an empty person DTO from person table
	 *
	 * makes call to phone DAO's method that will
	 * return phone DTO from phone table
	 *
	 * makes call to address DAO's method that will
	 * return address DTO from address table
	 * 
	 * returns a person DTO
	 * and closes db connection
	 */
	function loadPersonDetails($personID){
		self::openConn();
		try 
		{
			$personDTO = PersonDAO::getPersonDTO($personID, "", "", "");
			$phoneDTO = PhoneDAO::loadPhone($this->con, $personID);
			$addressDTO = AddressDAO::loadAddress($this->con, $personID);
			$personDTO->setPhoneDTO($phoneDTO);
			$personDTO->setAddrDTO($addressDTO);
		}catch(PDOException $e){ /* guarantees db con close */ $personDTO = NULL;}
		self::closeConn();
		return $personDTO;
	}
	
	/*
	 * opens connection to the db
	 *
	 * makes call to person DAO's method that will
	 * return an array of all person DTOs from person table
	 *
	 * returns an array of person DTOs
	 * and closes db connection
	 */
	function loadAllPersons(){
	    self::openConn();
		try 
		{
			$personList = PersonDAO::loadPersonsList($this->con);
		}catch(PDOException $e){ /* guarantees db con close */ $personListDTO = NULL;}
		self::closeConn();
		return $personList;
	}
	
	/*
	 * opens connection to the db
	 * begins db transaction
	 *
	 * makes call to phone DAO's method that will
	 * delete a phone DTO from phone table
	 *
	 * makes call to address DAO's method that will
	 * delete a address DTO from address table
	 *
	 * makes call to person DAO's method that will
	 * delete a person DTO from person table
	 * 
	 * creates a result DTO to return
	 * commits or rolls back db transaction
	 * and closes db connection
	 */
	function deletePerson($person_id) {
		self::openConn();
		try 
		{
			$this->con->beginTransaction();
			PhoneDAO::deletePhone($this->con, $person_id);
			AddressDAO::deleteAddress($this->con, $person_id);
			$result = PersonDAO::deletePerson($this->con, $person_id);
			$returnDTO = new ResultDTO($result, "DELETED");
			$this->con->commit();
		}
		catch(PDOException $e)
		{
			$error_msg = $e->getMessage();
			$returnDTO = NULL;
			$this->con->rollBack();
		}
		self::closeConn();
		return $returnDTO;
	}
	
	/*
	 * opens connection to the db
	 *
	 * makes call to person DAO's method that will
	 * return a populated person DTO from person table
	 *
	 * makes call to phone DAO's method that will
	 * return phone DTO from phone table
	 *
	 * makes call to address DAO's method that will
	 * return address DTO from address table
	 * 
	 * returns a person DTO
	 * and closes db connection
	 */
	function loadOnePerson($personID){
		self::openConn();
		try 
		{
			$personDTO = PersonDAO::loadPerson($this->con, $personID);
			$phoneDTO = PhoneDAO::loadPhone($this->con, $personID);
			$addressDTO = AddressDAO::loadAddress($this->con, $personID);
			$personDTO->setPhoneDTO($phoneDTO);
			$personDTO->setAddrDTO($addressDTO);
		}catch(PDOException $e){ /* guarantees db con close */ $personDTO = NULL;}
		self::closeConn();
		return $personDTO;
	}
	
	/*
	 * opens connection to the db
	 * begins db transaction
	 *
	 * makes call to address DAO's method that will
	 * update address table from address DTO 
	 * 
	 * makes call to phone DAO's method that will
	 * update phone table from phone DTO 
	 * 
	 * makes call to person DAO's method that will
	 * update person table from person DTO 
	 * 
	 * commits or rolls back db transaction
	 * returns a result DTO
	 * and closes db connection
	 */
	function updatePersonRecord($personDTO){
		self::openConn();
		$this->con->beginTransaction();
		try {
			AddressDAO::updateAddress($this->con, $personDTO->getAddrDTO());
			PhoneDAO::updatePhone($this->con, $personDTO->getPhoneDTO());
			$person_id = PersonDAO::updatePerson($this->con, $personDTO);
			$resultDTO = new ResultDTO($person_id, "UPDATED");
			$this->con->commit();
		}
		catch(PDOException $e)
		{
			$person_id = "person insert Error: " . $e->getMessage();
			$resultDTO = NULL;
			$this->con->rollBack();
		}
		self::closeConn();
		return $resultDTO;
	}
	
	/*
	 * opens connection to the db
	 *
	 * makes call to state DAO's method that will
	 * return an array of all state DTOs from state table
	 *
	 * returns an array of state DTOs
	 * and closes db connection
	 */
	function getStateList(){
		self::openConn();
		try 
		{
			$stateList = StateDAO::readStateList($this->con);
		}catch(PDOException $e){ /* guarantees db con close */ $stateList = NULL;}
		self::closeConn();
		return $stateList;
	}
	
	/*
	 * opens connection to the db
	 *
	 * makes call to phone DAO's method that will
	 * return an array of phone DTOs from phone_type table
	 * (DTOs will contain only phone types and phone type ids)
	 * 
	 * returns an array of phone DTOs
	 * and closes db connection
	 */
	function loadPhoneTypes(){
		self::openConn();
		try 
		{
			$this->phoneDAO = new PhoneDAO();
			$phoneTypeList = $this->phoneDAO->loadPhoneTypeList($this->con);
		}catch(PDOException $e){ /* guarantees db con close */ $phoneTypeList = NULL;}
		self::closeConn();
		return $phoneTypeList;
	}
	
	/*
	 * closes db connection
	 */
	function closeConn() {
		$this->db->db_close($this->con);
	}
}
?>

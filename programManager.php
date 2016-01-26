<?php
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
		$this->person_dto = $tempPersonDTO;
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->createPerson($this->con, $tempPersonDTO);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function readPerson(){
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->readPersonList($this->con);
		$return = new ResultDTO($result, "READ");
		$json = json_encode($return);
		echo $json;
	}
	function deletePerson($person_id) {
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->deletePerson($this->con, $person_id);
		$return = new ResultDTO($result, "DELETED");
		$json = json_encode($return);
		echo $json;
	}
	function updatePerson($personID){
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->getPerson($this->con, $personID);
		$return = new ResultDTO($result, "DISPLAYED");
		$json = json_encode($return);
		echo $json;
	}
	function updatePersonRecord($personDTO){
		$this->personDAO = new PersonDAO();
		$result = $this->personDAO->updatePerson($this->con, $personDTO);
		$return = new ResultDTO($result, "CREATED");
		$json = json_encode($return);
		echo $json;
	}
	function getPhoneTypes(){
		$this->phoneDAO = new PhoneDAO();
		$phoneTypeList = $this->phoneDAO->readPhoneTypeList($this->con);
		$json = json_encode($phoneTypeList);
		echo $json;
	}
	
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
	function getState(){
		$stateList = readStateList($this->con);
		$json = json_encode($stateList);
		echo $json;
	}
	function closeConn() {
		$this->db->db_close($this->con);
	}
}
?>

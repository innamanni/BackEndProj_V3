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
	function createAddr($street1,$street2,$city,$state_id,$zip,$address_id) {
		$tempAddressDTO = new AddressDTO($street1,
						$street2,
						$city,
						$state_id,
						$zip,
						$address_id);
		$this->addr_dto = $tempAddressDTO;
		$result = createAddress($con, $tempAddressDTO);
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

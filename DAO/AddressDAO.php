<?php
require_once '../DAO/BaseDAO.php';
class AddressDAO extends BaseDAO{

	function __construct() {
		//$this->setCon($dbCon);
		//$this->setDTO($addrDTO); 
		//$this->setID($addrID); 
	}
	
	public static function getAddressDTO($tempStreet1, $tempStreet2, $tempCity, $tempStateID, $tempZip, $tempAddrID, $tempPersonID){
		$tempAddrDTO = new AddressDTO($tempStreet1, $tempStreet2, $tempCity, $tempStateID, $tempZip, $tempAddrID, $tempPersonID);
		return $tempAddrDTO;
	}
	
	public static function loadAddress($con, $person_id)
	{
		$sql = "select * from address where person_id = $person_id;";
		$stmt = $con->query($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$tempAddrDTO = AddressDAO::getAddressDTO($row['street1'], $row['street2'], $row['city'], $row['state_id'], $row['zip'], $row['address_id'], $row['person_id']);

		return $tempAddrDTO;
	}
	function readAddressList($con)
	{
		$addressList = array();
		$sql = "SELECT * FROM address LEFT JOIN state ON address.state_id=state.state_id";
		foreach ($con->query($sql) as $row)
		{	
			$tempAddressDTO = new AddressDTO(
						$row['street1'],
						$row['street2'],
						$row['city'],
						$row['abbr'],
						$row['zip'],
						$row['address_id'],
						$row['person_id']);
						//echo "<br><br>count($addressList) is " . count($addressList) . "<br><br>";
			$addressList[count($addressList)] = $tempAddressDTO;
		}
		return $addressList;
	}
	public static function createAddress($con, $dto) 
	{
		$person_id = $dto->getPersonID();
		$street1 = $dto->getStreet1();
		$street2 = $dto->getStreet2();
		$city = $dto->getCity();
		$state_id = $dto->getStateID();
		$zip = $dto->getZip();
		
		$stmt = $con->prepare("INSERT INTO address (street1, street2, city, state_id, zip, person_id) VALUES (:street1, :street2, :city, :state_id, :zip, :person_id)");
		
		$stmt->bindParam(':street1', $street1);
		$stmt->bindParam(':street2', $street2);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':state_id', $state_id);
		$stmt->bindParam(':zip', $zip);
		$stmt->bindParam(':person_id', $person_id);
		
		$stmt->execute();
		$address_id = $con->lastInsertId();

		return $address_id;
	}
	public static function deleteAddress($con, $person_id)
	{
		$numOfPersons = count($person_id);
		$sql_address = "delete from address where person_id in (";
		for ($i = 0; $i < $numOfPersons; $i++) {
				$sql_address .= ":id" . $i;
				if ($numOfPersons - $i > 1) {$sql_address .= ',';}
		}
		$sql_address .= ")";
		$stmt = $con->prepare($sql_address);
		
		for ($i = 0; $i < $numOfPersons; $i++) {
			$stmt->bindParam(':id' . $i, $person_id[$i]);
		}
		$stmt->execute();
		return $sql_address;
	}
	function getAddress($con, $address_id)
	{
		$sql = "SELECT * FROM address LEFT JOIN state ON address.state_id=state.state_id where address_id=\"" . $address_id . "\"";
		/*$stmt = $con->query($sql);
		$data = $stmt->fetchAll();
		$tempAddressDTO = new AddressDTO(
					$data['street1'],
					$data['street2'],
					$data['city'],
					$data['abbr'],
					$data['zip'],
					$address_id);*/		
		foreach ($con->query($sql) as $row)
		{	
			$tempAddressDTO = new AddressDTO(
						$row['street1'],
						$row['street2'],
						$row['city'],
						$row['state_id'],
						$row['zip'],
						$row['address_id'],
						$row['person_id']);
		}
		return $tempAddressDTO;
	}
	public static function updateAddress($con, $addressDTO)
	{
		$person_id = $addressDTO->getPersonID();
		$street1 = $addressDTO->getStreet1();
		$street2 = $addressDTO->getStreet2();
		$city = $addressDTO->getCity();
		$state_id = $addressDTO->getStateID();
		$zip = $addressDTO->getZip();
		$stmt = $con->prepare("UPDATE address SET street1=:street1, street2=:street2, city=:city, state_id=:state_id, zip=:zip WHERE person_id=:person_id");
		$stmt->bindParam(':street1', $street1);
		$stmt->bindParam(':street2', $street2);
		$stmt->bindParam(':city', $city);
		$stmt->bindParam(':state_id', $state_id);
		$stmt->bindParam(':zip', $zip);
		$stmt->bindParam(':person_id', $person_id);
		$stmt->execute();
	}
	/*
	function updateAddress($con, $dto)
	{
		//$sql = "UPDATE address SET 'column1'=value, column2=value2,... WHERE some_column=some_value";
		try {
				$street1 = $dto->getStreet1();
				$street2 = $dto->getStreet2();
				$city = $dto->getCity();
				$state_id = $dto->getState();
				$zip = $dto->getZip();
				$address_id = $dto->getID();
				$stmt = $con->prepare("UPDATE address SET street1=:street1, street2=:street2, city=:city, state_id=:state_id, zip=:zip WHERE address_id=:address_id");
				$stmt->bindParam(':street1', $street1);
				$stmt->bindParam(':street2', $street2);
				$stmt->bindParam(':city', $city);
				$stmt->bindParam(':state_id', $state_id);
				$stmt->bindParam(':zip', $zip);
				$stmt->bindParam(':address_id', $address_id);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				//echo "Error: " . $e->getMessage();
			}
			return $address_id;
	}
	*/
}
?>

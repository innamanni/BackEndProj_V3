<?php
require_once 'DAO/BaseDAO.php';
class AddressDAO extends BaseDAO{
	var $con;
	var $dto;
	var $address_id;
	function getID()
	{
		return $this->address_id;
	}
	function setID($tempID)
	{
		$this->address_id=$tempID;
	}
	function getDTO()
	{
		return $this->dto;
	}
	function setDTO($tempDTO)
	{
		$this->dto=$tempDTO;
	}
	function getCon()
	{
		return $this->con;
	}
	function setCon($tempCon)
	{
		$this->con=$tempCon;
	}
	function __construct() {
		//$this->setCon($dbCon);
		//$this->setDTO($addrDTO); 
		//$this->setID($addrID); 
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
						$row['address_id']);
						//echo "<br><br>count($addressList) is " . count($addressList) . "<br><br>";
			$addressList[count($addressList)] = $tempAddressDTO;
		}
		return $addressList;
	}
	function createAddress($con, $dto) 
	{
			try {
				$street1 = $dto->getStreet1();
				$street2 = $dto->getStreet2();
				$city = $dto->getCity();
				$state_id = $dto->getState();
				$zip = $dto->getZip();
				$stmt = $con->prepare("INSERT INTO address (street1, street2, city, state_id, zip) VALUES (:street1, :street2, :city, :state_id, :zip)");
				$stmt->bindParam(':street1', $street1);
				$stmt->bindParam(':street2', $street2);
				$stmt->bindParam(':city', $city);
				$stmt->bindParam(':state_id', $state_id);
				$stmt->bindParam(':zip', $zip);
				$stmt->execute();
				//echo '<br><br>Hello from AddressDAO with PDO prepared statement<br><br>';
				$address_id = $con->lastInsertId();
				//echo 'address_id: ' . $address_id . '<br><br>';
				//var_dump($dto);
			}
			catch(PDOException $e)
			{
				//echo "Error: " . $e->getMessage();
			}
			return $address_id;
	}
	function deleteAddress($con, $address_id)
	{
		$numOfAddr = count($address_id);
		$sql = "delete from address where address_id in (";
		for ($i = 0; $i < $numOfAddr; $i++) {
				$sql .= ":id" . $i;
				if ($numOfAddr - $i > 1) {$sql .= ',';}
			}
		{$sql .= ")";}
		try 
		{
			// delete from address where address_id in (0, 1, 2, 3);
			$stmt = $con->prepare($sql);
			for ($i = 0; $i < $numOfAddr; $i++) {
				$stmt->bindParam(':id' . $i, $address_id[$i]);
			}
			$stmt->execute();
			echo "Record deleted successfully";
		}
		catch(PDOException $e)
		{
			$sql = "<br>" . $e->getMessage();
		}
		return $sql;
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
						$row['address_id']);
		}
		return $tempAddressDTO;
	}
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
}
?>


<?php
//header('Content-type:application/json; charset=utf-8');
include "programManager.php";
include "db_util.php";
include "DTO/AddressDTO.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/StateDTO.php";
include 'DTO/ResultDTO.php';
//include 'DTO/BaseDTO.php';
$data_back = json_decode(file_get_contents('php://input'));

$street1 = $data_back->{"street1"};
$street2 = $data_back->{"street2"};
$city = $data_back->{"city"};
$state_id = $data_back->{"state"};
$zip = $data_back->{"zip"};
$address_id = " ";

$tempAddressDTO = new AddressDTO($street1,
				$street2,
				$city,
				$state_id,
				$zip,
				$address_id);

$progrManager = new programManager();
$progrManager->openConn();
$progrManager->createAddr($tempAddressDTO);
$progrManager->closeConn();
?>

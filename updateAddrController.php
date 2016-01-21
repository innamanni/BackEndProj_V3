
<?php
//header('Content-type:application/json; charset=utf-8');
include "programManager.php";
include "db_util.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/AddressDTO.php";
include "DTO/StateDTO.php";
include 'DTO/ResultDTO.php';
//include 'DTO/BaseDTO.php';
$data_back = json_decode(file_get_contents('php://input'));
$address_id = $data_back->{"address_id"};
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->updateAddr($address_id);
$progrManager->closeConn();
//$con = db_connect();
//$result = getAddress($con, $address_id);
//$json = json_encode($result);
//echo $json;
//db_close($con);
?>

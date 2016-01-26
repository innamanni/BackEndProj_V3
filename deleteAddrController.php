
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
$address_id_list = $_GET['deleteId'];
//echo "<br>address_id_list: " . $address_id_list;
$address_id = explode(',', $address_id_list);
//echo "<br>count(address_id): " . count($address_id);
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->deleteAddr($address_id);
$progrManager->closeConn();
//$con = db_connect();
//$result = deleteAddress($con, $address_id);
//echo "<br>result: " . $result;
//db_close($con);
?>

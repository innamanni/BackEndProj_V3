<?php
//header('Content-type: application/json');

include "db_util.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/AddressDTO.php";
include "DTO/StateDTO.php";

$con = db_connect();
$addressesList = readAddressList($con);
$json = json_encode($addressesList);
echo $json;
db_close($con);
?>

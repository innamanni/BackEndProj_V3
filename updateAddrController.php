
<?php
//header('Content-type:application/json; charset=utf-8');
include "db_util.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/AddressDTO.php";
include "DTO/StateDTO.php";
include 'DTO/ResultDTO.php';
$data_back = json_decode(file_get_contents('php://input'));
$address_id = $data_back->{"address_id"};
$con = db_connect();
$result = getAddress($con, $address_id);
$json = json_encode($result);
echo $json;
db_close($con);
?>

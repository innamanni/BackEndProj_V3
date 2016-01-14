
<?php
//header('Content-type:application/json; charset=utf-8');
include "db_util.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/AddressDTO.php";
include "DTO/StateDTO.php";
include 'DTO/ResultDTO.php';
$address_id_list = $_GET['deleteId'];
echo "<br>address_id_list: " . $address_id_list;
$address_id = explode(',', $address_id_list);
echo "<br>count(address_id): " . count($address_id);
$con = db_connect();
$result = deleteAddress($con, $address_id);
echo "<br>result: " . $result;
//$return = new ResultDTO($result, "DELETED");
//$json = json_encode($return);
//echo $json;
db_close($con);
?>

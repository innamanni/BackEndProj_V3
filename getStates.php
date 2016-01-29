<?php
include "programManager.php";
include "db_util.php";
include "DTO/PersonDTO.php";
include "DAO/PersonDAO.php";
include "DTO/PhoneDTO.php";
include "DAO/PhoneDAO.php";
include "DAO/AddressDAO.php";
include "DTO/AddressDTO.php";
include "DAO/StateDAO.php";
include "DTO/StateDTO.php";
include "DTO/StatesDTO.php";
include 'DTO/ResultDTO.php';
$progrManager = new programManager();
$states = $progrManager->getStateList();
$json = json_encode($states);
echo $json;
?>

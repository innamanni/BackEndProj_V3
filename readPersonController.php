<?php
//header('Content-type: application/json');
include "programManager.php";
include "db_util.php";
include "DTO/PersonDTO.php";
include "DAO/PersonDAO.php";
include "DTO/PhoneDTO.php";
include "DAO/PhoneDAO.php";
include "DTO/AddressDTO.php";
include "DAO/AddressDAO.php";
include 'DTO/ResultDTO.php';
$progrManager = new programManager();
$personListDTO = $progrManager->readPerson();
$json = json_encode($personListDTO);
echo $json;
?>

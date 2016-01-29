<?php
//header('Content-type: application/json');
require_once "programManager.php";
require_once "db_util.php";
require_once "DTO/PersonDTO.php";
require_once "DAO/PersonDAO.php";
require_once "DTO/PhoneDTO.php";
require_once "DAO/PhoneDAO.php";
require_once "DAO/AddressDAO.php";
require_once "DTO/AddressDTO.php";
require_once "DAO/StateDAO.php";
require_once "DTO/StateDTO.php";
require_once 'DTO/ResultDTO.php';
require_once 'DTO/PersonsDTO.php';
$data_back = json_decode(file_get_contents('php://input'));
$person_id = $data_back->{"person_id"};
$progrManager = new programManager();
$personsListDTO = $progrManager->loadPersonDetails($person_id);
$json = json_encode($personsListDTO);
echo $json;
?>


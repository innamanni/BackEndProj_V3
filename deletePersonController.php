
<?php
//header('Content-type:application/json; charset=utf-8');
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
$person_id_list = $_GET['deleteId'];
$person_id = explode(',', $person_id_list);
$progrManager = new programManager();
$progrManager->deletePerson($person_id);
?>

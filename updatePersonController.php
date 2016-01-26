
<?php
//header('Content-type:application/json; charset=utf-8');
include "programManager.php";
include "db_util.php";
include "DTO/PersonDTO.php";
include "DAO/PersonDAO.php";
include "DTO/PhoneDTO.php";
include "DAO/PhoneDAO.php";
include 'DTO/ResultDTO.php';
$data_back = json_decode(file_get_contents('php://input'));
$person_id = $data_back->{"person_id"};
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->updatePerson($person_id);
$progrManager->closeConn();
?>

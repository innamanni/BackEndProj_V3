
<?php
require_once "../programManager.php";
require_once "../db_util.php";
require_once "../DTO/PersonDTO.php";
require_once "../DAO/PersonDAO.php";
require_once "../DTO/PhoneDTO.php";
require_once "../DAO/PhoneDAO.php";
require_once "../DAO/AddressDAO.php";
require_once "../DTO/AddressDTO.php";
require_once "../DAO/StateDAO.php";
require_once "../DTO/StateDTO.php";
require_once '../DTO/ResultDTO.php';
require_once '../DTO/PersonsDTO.php';

// get data from the front end
$person_id_list = $_GET['deleteId'];
$person_id = explode(',', $person_id_list);

// pass data to program manager
$progrManager = new programManager();
$returnDTO = $progrManager->deletePerson($person_id);

// encode data and pass back to front end
$json = json_encode($returnDTO);
echo $json;
?>


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
$data_back = json_decode(file_get_contents('php://input'));
$person_id = $data_back->{"person_id"};

// pass data to program manager
$progrManager = new programManager();
$personDTO = $progrManager->loadOnePerson($person_id);

// encode data and pass back to front end
$json = json_encode($personDTO);
echo $json;
?>

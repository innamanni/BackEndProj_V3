
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
$person_json = json_decode(file_get_contents('php://input'));
$phone_json = $person_json->{"phoneDTO"};
$address_json = $person_json->{"addrDTO"};

// create dtos 
$phoneDTO = PhoneDTO::hydrateSelf($phone_json);
$addressDTO = AddressDTO::hydrateSelf($address_json);
$personDTO = PersonDTO::hydrateSelf($person_json);
if (!empty($phoneDTO)){$personDTO->setPhoneDTO($phoneDTO);}
if (!empty($addressDTO)){$personDTO->setAddrDTO($addressDTO);}

// pass data to program manager
$progrManager = new programManager();
$returnDTO = $progrManager->updatePersonRecord($personDTO);

// encode data and pass back to front end
$json = json_encode($returnDTO);
echo $json;
?>

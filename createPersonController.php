
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
$person_json = json_decode(file_get_contents('php://input'));
$phone_json = $person_json->{"phone"};
$address_json = $person_json->{"address"};
$phoneDTO = PhoneDTO::hidrateSelf($phone_json);
$addressDTO = AddressDTO::hidrateSelf($address_json);
$personDTO = PersonDTO::hidrateSelf($person_json);
if (!empty($phoneDTO)){$personDTO->setPhoneDTO($phoneDTO);}
if (!empty($addressDTO)){$personDTO->setAddrDTO($addressDTO);}
$progrManager = new programManager();
$return = $progrManager->createPerson($personDTO);
$json = json_encode($return);
echo $json;
?>

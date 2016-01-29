
<?php
//header('Content-type:application/json; charset=utf-8');
<<<<<<< HEAD
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
/*
$data_back = json_decode(file_get_contents('php://input'));
$phone = $data_back->{"phone"};
$address = $data_back->{"address"};
$phone_number = $phone->{"phone_number"};
$phone_type_id = $phone->{"phone_type_id"};
$f_name = $data_back->{"fname"};
$l_name = $data_back->{"lname"};
$email_addr = $data_back->{"email"};
$street1 = $address->{"street1"};
$street2 = $address->{"street2"};
$city = $address->{"city"};
$state_id = $address->{"state_id"};
$zip = $address->{"zip"};
*/
//$address_id = "";
//$person_id = "";
//$phone_id = "";
//$phone_type = "";
//$phoneDTO = PhoneDAO::getPhoneDTO($phone_id, $person_id, $phone_type_id, $phone_number,  $phone_type);
//$addressDTO = AddressDAO::getAddressDTO($street1, $street2, $city, $state_id, $zip, $address_id, $person_id);
//$personDTO = PersonDAO::getPersonDTO($person_id, $l_name, $f_name, $email_addr, $phoneDTO,  $addressDTO);
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
=======
include "programManager.php";
include "db_util.php";
include "DTO/PersonDTO.php";
include "DAO/PersonDAO.php";
include 'DTO/ResultDTO.php';
$data_back = json_decode(file_get_contents('php://input'));

$f_name = $data_back->{"fname"};
$l_name = $data_back->{"lname"};
$email_addr = $data_back->{"email"};
$person_id = " ";

$tempPersonDTO = new PersonDTO($person_id, 
				$l_name, 
				$f_name,
				$email_addr);

$progrManager = new programManager();
$progrManager->openConn();
$progrManager->createPerson($tempPersonDTO);
$progrManager->closeConn();
>>>>>>> origin/master
?>

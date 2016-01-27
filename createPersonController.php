
<?php
//header('Content-type:application/json; charset=utf-8');
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
include 'DTO/ResultDTO.php';
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
$address_id = "";
$person_id = "";
$phone_id = "";
$phone_type = "";
$phoneDTO = PhoneDAO::getPhoneDTO($phone_id, $person_id, $phone_type_id, $phone_number,  $phone_type);
$addressDTO = AddressDAO::getAddressDTO($street1, $street2, $city, $state_id, $zip, $address_id, $person_id);
$personDTO = PersonDAO::getPersonDTO($person_id, $l_name, $f_name, $email_addr, $phoneDTO,  $addressDTO);
$progrManager = new programManager();
$progrManager->createPerson($personDTO);
?>

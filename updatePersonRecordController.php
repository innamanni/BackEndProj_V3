
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
$phone = $data_back->{"phoneDTO"};
$address = $data_back->{"addrDTO"};
$phone_number = $phone->{"phone_number"};
$phone_type_id = $phone->{"phone_type_id"};
$phone_id = $phone->{"phone_id"};
$phone_type = $phone->{"phone_type"};
$f_name = $data_back->{"f_name"};
$l_name = $data_back->{"l_name"};
$email_addr = $data_back->{"email_addr"};
$person_id = $data_back->{"person_id"};
$street1 = $address->{"street1"};
$street2 = $address->{"street2"};
$city = $address->{"city"};
$state_id = $address->{"state_id"};
$zip = $address->{"zip"};
$address_id = $address->{"address_id"};
$tempPhoneDTO = PhoneDAO::getPhoneDTO($phone_id, $person_id, $phone_type_id, $phone_number,  $phone_type);
$tempAddressDTO = AddressDAO::getAddressDTO($street1, $street2, $city, $state_id, $zip, $address_id, $person_id);
$tempPersonDTO = PersonDAO::getPersonDTO($person_id, $l_name, $f_name, $email_addr, $tempPhoneDTO,  $tempAddressDTO);
$progrManager = new programManager();
$progrManager->updatePersonRecord($tempPersonDTO);
?>

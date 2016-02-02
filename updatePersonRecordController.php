
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
$phone_json = $person_json->{"phoneDTO"};
$address_json = $person_json->{"addrDTO"};
$phoneDTO = PhoneDTO::hidrateSelf($phone_json);
$addressDTO = AddressDTO::hidrateSelf($address_json);
$personDTO = PersonDTO::hidrateSelf($person_json);
if (!empty($phoneDTO)){$personDTO->setPhoneDTO($phoneDTO);}
if (!empty($addressDTO)){$personDTO->setAddrDTO($addressDTO);}
$progrManager = new programManager();
$return = $progrManager->updatePersonRecord($personDTO);
$json = json_encode($return);
echo $json;
/*
{"person_id":"69","f_name":"Bobious","l_name":"Schmobious","email_addr":"bschmobious@email.com",
"phoneDTO":{"phone_number":"9996666666","person_id":"69","phone_id":"45","phone_type_id":"3","phone_type":""},
"addrDTO":{"street1":"1111 Milton Cir","street2":"Apt 99999","city":"Huston","state_id":"45","zip":"56956","person_id":"69","address_id":"76"}}
*/

/*
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
*/
?>

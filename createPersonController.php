
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
$phone = $data_back->{"phone"};
$phone_number = $phone->{"phone_number"};
$phone_type_id = $phone->{"phone_type_id"};
$f_name = $data_back->{"fname"};
$l_name = $data_back->{"lname"};
$email_addr = $data_back->{"email"};
$person_id = "";
$phone_id = "";
$phone_type = "";
//$tempPhoneID, $tempPersonID, $tempPhoneTypeID, $tempPhoneNum, $tempPhoneType
$tempPhoneDTO = new PhoneDTO($phone_id, 
				$person_id, 
				$phone_type_id,
				$phone_number, 
				$phone_type);
$tempPersonDTO = new PersonDTO($person_id, 
				$l_name, 
				$f_name,
				$email_addr, 
				$tempPhoneDTO);
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->createPerson($tempPersonDTO);
$progrManager->closeConn();
?>

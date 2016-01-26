
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
$phone = $data_back->{"phoneDTO"};
$phone_number = $phone->{"phone_number"};
$phone_type_id = $phone->{"phone_type_id"};
$phone_id = $phone->{"phone_id"};
$phone_type = $phone->{"phone_type"};
$f_name = $data_back->{"f_name"};
$l_name = $data_back->{"l_name"};
$email_addr = $data_back->{"email_addr"};
$person_id = $data_back->{"person_id"};
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
$progrManager->updatePersonRecord($tempPersonDTO);
$progrManager->closeConn();
?>

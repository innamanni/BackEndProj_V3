
<?php
//header('Content-type:application/json; charset=utf-8');
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
?>

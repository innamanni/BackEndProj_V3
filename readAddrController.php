<?php
//header('Content-type: application/json');
include "programManager.php";
include "db_util.php";
include "DAO/AddressDAO.php";
include "DAO/StateDAO.php";
include "DTO/AddressDTO.php";
include "DTO/StateDTO.php";
include 'DTO/ResultDTO.php';
//include 'DTO/BaseDTO.php';
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->readAddr();
$progrManager->closeConn();
?>

<?php
include "db_util.php";
include "DAO/StateDAO.php";
include "DTO/StateDTO.php";
include "programManager.php";
$progrManager = new programManager();
$progrManager->openConn();
$progrManager->getState();
$progrManager->closeConn();
?>

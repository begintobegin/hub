<?php
session_start();
require "functionsAuth/functionsAuth.php";
require "../includes/databaseConnect.php";
if (isset($_POST)) {
   $PostArray = $_POST;
   isFieldEmpty($_POST["email"]);
   validationEmail($_POST["email"],$pdo);
   Login($PostArray,$pdo);
} else {

}

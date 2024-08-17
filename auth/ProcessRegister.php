<?php
session_start();
require "functionsAuth/functionsAuth.php";
require "../includes/databaseConnect.php";
if (isset($_POST)) {
   $PostArray = $_POST;
   isFieldEmpty($_POST["email"],"email");

   validationEmail($_POST["email"],$pdo);
   isFieldEmpty($_POST["username"],"username");
   validationUserName($_POST["username"],$pdo);   
   isEmailUnique($_POST["email"],$pdo);
   isValidPassword($_POST["password"],$_POST["password-repeat"]);
   Registration($PostArray,$pdo);

} else {

}

<?php
require_once "../Models/userModel.php";
$user;
$user["username"]="Zaman2";
$user["email"]="Z@Z.com";
$user["password"]="ffdertqw!@";
$user["address"]="New Market";
$user["balance"]="23100";
$user["userType"]="customer";


insertUser($user);



?>
<?php

session_start();

$userid=$_SESSION['adminEditingUsers.php']['selectedUserID'];  

require_once "../../Models/userModel.php";

if(isset($_POST["username"]))
{
$username= $_POST["username"];

 
if(checkUsername3($username,$userid)==true){echo "Username already taken";}

else{echo "Username not taken";}
}




else if(isset($_POST["email"]))
{
$email= $_POST["email"];

 
if(checkEmail3($email,$userid)==true){echo "Email already taken";}

else{echo "Email not taken";}
}




?>
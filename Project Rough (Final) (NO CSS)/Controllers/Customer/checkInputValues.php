<?php

session_start();

//$userid=$_SESSION['adminEditingUsers.php']['selectedUserID'];  

require_once "../../Models/userModel.php";

if(isset($_POST["username"]))
{
$username= $_POST["username"];

 
if(checkUsername2($username)==true){echo "Username already taken";}

else{echo "Username not taken";}
}




else if(isset($_POST["email"]))
{
$email= $_POST["email"];

 
if(checkEmail2($email)==true){echo "Email already taken";}

else{echo "Email not taken";}
}




?>
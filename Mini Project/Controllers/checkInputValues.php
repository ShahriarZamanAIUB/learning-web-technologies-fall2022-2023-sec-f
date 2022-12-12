<?php

session_start();

//$userid=$_SESSION['adminEditingUsers.php']['selectedUserID'];  

require_once "../Models/userModel.php";

if(isset($_POST["username"]))
{
$username= $_POST["username"];

 $user['username']=$username;
if(checkUsername($user)==true){echo "Username already taken";}

else{echo "Username not taken";}
}




else if(isset($_POST["email"]))
{
    $user["email"]= $_POST["email"];

 
if(checkEmail($user)==true){echo "Email already taken";}

else{echo "Email not taken";}
}


else if(isset($_POST["ID"]))
{
    $user["id"]= $_POST["ID"];

 
if(checkID($user)==true){echo "ID already taken";}

else{echo "ID not taken";}
}




?>
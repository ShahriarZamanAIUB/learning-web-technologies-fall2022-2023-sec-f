<?php
require_once "../../Models/userModel.php";

$user["username"]=$_POST["username"];
$user["email"]=$_POST["email"];
$user["address"]=$_POST["address"];

$user["balance"]=$_COOKIE["balance"];
$user["userType"]=$_COOKIE["userType"];


if(trim($_POST["oldPassword"])==$_COOKIE["password"])
{
    $user["password"]=$_POST["newPassword"];

    if(( $user["email"]!=$_COOKIE["email"] && checkEmail($user)==true) ||($user["username"]!=$_COOKIE["username"] && checkUsername($user)==true )){
        header('location: ../../Views/Customer/customerEditingProfile.php?err=already_exists');   
    }

  else{  

    if(editUser($user)==true)
    {

       

    setUserCookies($user,72);

         header('location: ../../Views/Customer/customerEditingProfile.php?message=edit_success');

    }

}


     
}

else{ header('location: ../../Views/Customer/customerEditingProfile.php?err=old_password_wrong');}


?>
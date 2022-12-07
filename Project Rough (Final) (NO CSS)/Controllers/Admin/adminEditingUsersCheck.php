<?php

session_start();

require_once "../../Models/userModel.php";


if(!isset($_SESSION['adminEditingUsers.php']['selectedUserID']))
{
  header('location: ../../Views/Admin/adminDashboard.php?message=sorry_try_again');

}


$selectedUser["username"]=$_POST['username'];

$selectedUser["userid"]= $_SESSION['adminEditingUsers.php']['selectedUserID']; 

$selectedUser["email"]=$_POST['email'];

$selectedUser["password"]=$_POST['password'];

$selectedUser["balance"]=$_POST['balance'];

$selectedUser["address"]=$_POST['address'];

 

 /*echo $selectedUser["username"]."---";

 echo $selectedUser["userid"]."---";


 echo $selectedUser["email"]."---";


 echo $selectedUser["password"]."---";

 echo $selectedUser["address"]."---"; */


 if(editUser2($selectedUser)==true)
 { header('location: ../../Views/Admin/adminEditingUsers.php?id='.$selectedUser["userid"]);

 }







?>
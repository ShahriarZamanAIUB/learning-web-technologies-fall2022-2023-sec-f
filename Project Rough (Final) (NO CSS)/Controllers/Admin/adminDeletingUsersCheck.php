<?php

require_once "../../Models/userModel.php";

if(isset($_POST["userid"])){

$userid=$_POST["userid"];

 
if(deleteUserByID($userid))
 {

    echo "Successfully deleted the account of this User";

 
 }

}


?>
<?php 

require_once  "../Models/userModel.php";

$data = $_POST['json'];
 
  $passwordjson = json_decode($data);
 //echo $passwordjson->password;
 $password=$passwordjson->password;

 if(updatePassword($password)==true)
 {echo "Password Change Successful"; setcookie('password',$password, time()+60*60,'/');}
 
 
 else{

    echo "Password Change failed";
 }


?>

 
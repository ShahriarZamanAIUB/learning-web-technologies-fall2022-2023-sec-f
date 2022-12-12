<?php 

require_once  "userModel.php";

$data = $_POST['json'];
$data = $_POST['json'];
  $passwordjson = json_decode($data);
 //echo $passwordjson->password;


 if(updatePassword($passwordjson->password)==true)
 {echo "Password Change Successful"; setcookie('password',$passwordjson->password, time()+60*60,'/');}
 else{

    echo "Password Change failed";
 }


?>

 
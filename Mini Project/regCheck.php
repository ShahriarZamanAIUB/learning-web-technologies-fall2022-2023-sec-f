<?php
     session_start();

     require_once  "userModel.php";

     $user['username']= $_POST['username'];
     $user['password']= $_POST['password'];
     $user['ID']=$_POST['ID'];
     $user['email']=$_POST['email'];
     $user['userType']=$_POST['userType'];
     
     if(insertUser($user)==true)
     {
        echo "Registration Successful!";

         setcookie('status',true,time()+60*60,'/');

         setcookie('username',$user['username'],time()+60*60,'/');

         setcookie('ID',$user['ID'],time()+60*60,'/');

         setcookie('password',$user['password'],time()+60*60,'/');

         setcookie('email',$user['email'],time()+60*60,'/');
         
         setcookie('userType',$user['userType'],time()+60*60,'/');

         if( $user['userType']=="User"){  header('location: userDashboard.php?message=reg_success');}
         else {  header('location: adminDashboard.php?message=reg_success');}

     }

     else{ echo "Registration Failed!"; header('location: registration.php?message=reg_failed');}
      

?>
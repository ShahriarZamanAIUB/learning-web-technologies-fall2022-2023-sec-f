<?php
    session_start();

    require_once  "userModel.php";


    $username = $_POST['username'];
    $password = $_POST['password'];
 

    if($username == "" || $password == ""){
        header('location: login.php?err=null');

    }
    
     
    
    else{ 
               $user["username"]=$username ;
               $user["password"]=$password;
     if(login($user)["status"]==true)
     {

        setcookie('status',true,time()+60*60,'/');

        setcookie('username',login($user)['username'],time()+60*60,'/');

        setcookie('ID',login($user)['ID'],time()+60*60,'/');

        setcookie('password',login($user)['password'],time()+60*60,'/');

        setcookie('email',login($user)['email'],time()+60*60,'/');
        
        setcookie('userType',login($user)['userType'],time()+60*60,'/');

        echo $user['userType'];

         if( login($user)['userType']=="user"){  header('location: userDashboard.php?message=reg_success');}
         else {  header('location: adminDashboard.php?message=reg_success');}


     }


       // else{header('location: login.php?err=invalid');}
    }

?>
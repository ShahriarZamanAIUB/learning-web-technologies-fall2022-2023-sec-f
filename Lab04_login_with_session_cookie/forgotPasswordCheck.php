<?php
    session_start();
    $email = $_POST['email'];
    $checkbox = $_POST['checkbox'];
  

    if($email == ""){
        header('location: forgotPassword.php?err=null');

    }
    
    else if($_SESSION['user']['email']== $email && $checkbox==true){
      //  $_SESSION['status'] = true;
        setcookie('status', 'true', time()+3600, '/');
        header('location: dashboard.php');
    }

    else if($_SESSION['user']['email']== $email && $checkbox==false ){
        //  $_SESSION['status'] = true;
          setcookie('status', 'true', time()+60, '/');
          header('location: dashboard.php');
      }

    
    else{
        header('location: forgotPassword.php?err=invalid');
    }

?>
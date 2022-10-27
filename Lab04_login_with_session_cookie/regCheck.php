<?php
     session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];

    if($username == "" || $password == "" || $email == "" ||$gender=="" ||$day=="" ||$month==""||$year=="" ){
        echo "Null values"; header('location: registration.php?err=null');

        
    }
    
    else if($password!=$confirmPassword){
     
       echo "Passwords do not match!";

    }else{
        $user = ['username'=> trim($username), 'password'=>trim($password), 'email'=>trim($email), 'gender'=>trim($gender),'day'=>trim($day),'month'=>trim($month),'year'=>trim($year) ];

        $_SESSION['user'] = $user;

        # $file =fopen('user.txt','a');
        # fwrite($file,  $_SESSION['user']['username']);    
        # fwrite($file, $_SESSION['user']['password']);  

        # fclose($file);

        header('location: login.php');

       
       
    }

?>
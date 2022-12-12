<?php

require_once "db.php";


function insertUser($user){

     

       $con = getConnection();
       $sql = "insert into users values('{$user['username']}','{$user['ID']}', '{$user['email']}', '{$user['password']}' , '{$user['userType']}')";
         
       $status = mysqli_query($con, $sql);

       if($status){ return true;} 
         else{return false;}


    }  


function updatePassword($password)
{

    $con = getConnection();
    $sql = "update users set password='{$password}' where username='{$_COOKIE['username']}'";
      
    $status = mysqli_query($con, $sql);

    if($status){ return true;} 
      else{return false;}

}
 


function login($user){
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)) {
     
            $username=$row["username"];  
            $password=$row["password"]; 
            $email=$row["email"];
             $ID=$row["id"];
            $userType=$row["usertype"];    
             
           
          
        }
        $user["email"]=$email;
         
        $user["ID"]=$ID;
        
        $user["userType"]=$userType;
        $user["status"]=true;


        return $user;  

        //return true;
    } 
    
    else{ $user["status"]=false; return $user;}
}


function checkEmail($user){
    $con = getConnection();
    $sql = "select * from users where email='{$user['email']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){return true;}
    
    else{return false;}
}


function checkUsername($user){
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){return true;}
    
    else{return false;}
}


function checkID($user){
    $con = getConnection();
    $sql = "select * from users where id='{$user['id']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){return true;}
    
    else{return false;}
}














?>
<?php
  
  require_once "db.php";

  require_once "restaurantModel.php";


    function login($user){
        $con = getConnection();
        $sql = "select * from allusers where username='{$user['username']}' and password='{$user['password']}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

            while($row = mysqli_fetch_array($result)) {
         
                $username=$row["username"];  
                $password=$row["password"]; 
                $email=$row["email"];   
                $address=$row["address"];
                $balance=$row["balance"];
                $userType=$row["usertype"];    
                 
               
              
            }
            $user["email"]=$email;
            $user["address"]=$address;
            $user["balance"]=$balance;
            $user["userType"]=$userType;
            $user["loginStatus"]=true;


            return $user;  

            //return true;
        } 
        
        else{ $user["loginStatus"]=false; return $user;}
    }


    function checkEmail($user){
        $con = getConnection();
        $sql = "select * from allusers where email='{$user['email']}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){return true;}
        
        else{return false;}
    }



    function checkUsername($user){
        $con = getConnection();
        $sql = "select * from allusers where username='{$user['username']}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){return true;}
         
        
        else{return false;}
    }

  /*  function insertUser($user){
        $con = getConnection();
        $sql = "insert into allUsers values('{$user['username']}', '{$user['password']}', '{$user['email']}' , '{$user['address']}' , '{$user['balance']}' , '{$user['userType']}')";
        $status = mysqli_query($con, $sql);

        if($status){ return true;} 
        
        
        
        else{return false;}
    } */


    function insertUser($user){

        $con = getConnection();
        $sql = "select max(userid)+1 newid from allusers";
        $status = mysqli_query($con, $sql);

        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

            while($row = mysqli_fetch_array($result)) {

                $new_id=$row["newid"];
          
            }
            
           // echo  $new_id;

           $con = getConnection();
           $sql = "insert into allUsers values('{$user['username']}','{$new_id}', '{$user['password']}', '{$user['email']}' , '{$user['address']}' , '{$user['balance']}' , '{$user['userType']}')";
             
           $status = mysqli_query($con, $sql);

           if($status){ return true;} 
             else{return false;}


        } else{return false;}
    }


    function setUserCookies($user,$hours)
    {   setcookie('status', 'true', time()+60*60*$hours, '/');

        setcookie('username', $user['username'], time()+60*60*$hours, '/');

        setcookie('password', $user['password'], time()+60*60*$hours, '/');

        setcookie('email', $user['email'], time()+60*60*$hours, '/');

        setcookie('userType', $user['userType'], time()+60*60*$hours, '/');

        setcookie('address', $user['address'], time()+60*60*$hours, '/');       

        setcookie('balance', $user['balance'], time()+60*60*$hours, '/');
        
          if($user['userType']=="restaurantOwner" || $user['userType']=="restaurantManager")
        {

            setcookie('restaurantName', $user['restaurantName'], time()+60*60*$hours, '/');

            setcookie('restaurantBalance', $user['restaurantBalance'], time()+60*60*$hours, '/');

            setcookie('restaurantAddress', $user['restaurantAddress'], time()+60*60*$hours, '/');

        }   
     

    }

    function editUser($user)
    {
        $con = getConnection();
        $sql = "update allUsers set  username='{$user["username"]}', email='{$user["email"]}', password='{$user["password"]}', address='{$user["address"]}' where username='{$_COOKIE["username"]}' and email='{$_COOKIE["email"]}'";
        $status = mysqli_query($con, $sql);

        if($status){ return true;} 
         
        else{return false;}



    }

    function setUserBalance($user)
    {

    }

    function dashboardFetcher($user)
    {
        
        $php_filename;
        
        
        switch ($user["userType"]) {

         case 'admin':
               $php_filename='../Views/Admin/adminDashboard.php';
          break;

        case 'foodCourtManager':
              $php_filename='../Views/FoodCourtManager/foodCourtManagerDashboard.php';
          break;

        case 'restaurantManager':
              $php_filename='../Views/RestaurantManager/restaurantManagerDashboard.php';
          break;

        case  'restaurantOwner':
                $php_filename='../Views/RestaurantOwner/restaurantOwnerDashboard.php';
          break;

        case  'customer':
               $php_filename='../Views/Customer/customerDashboard.php';
            break;
           
           
        default:
        header('location: ../Views/home.php?err=null');
      }

      return $php_filename;
        
    }



    function userRowCount()
    {
      
        $con = getConnection();
        $sql = "select count(*) count from allusers";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);


        if($count > 0){

            while($row = mysqli_fetch_array($result)) {
                $userRowCount=$row["count"];
            }
            
            return $userRowCount;
             
        } 

        else{ return 0;}


    }

    function idSuffix($user)
    {
      if($user["userType"]=="customer") {return "C";}

      else if($user["userType"]=="restaurantOwner") {return "RO";}

      else if($user["userType"]=="restaurantManager") {return "RM";}

      else { return false;}


    }



    function fetchUser($user)
    {
      $con = getConnection();
        $sql = "select * from allusers where username='{$user['username']}' and password='{$user['password']}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

            while($row = mysqli_fetch_array($result)) {
         
                $username=$row["username"];  
                $password=$row["password"]; 
                $email=$row["email"];   
                $address=$row["address"];
                $balance=$row["balance"];
                $userType=$row["usertype"];    
                 
               
              
            }
            $user["email"]=$email;
            $user["address"]=$address;
            $user["balance"]=$balance;
            $user["userType"]=$usertype;


            return $user;  

            //return true;
        } 


    }
?>
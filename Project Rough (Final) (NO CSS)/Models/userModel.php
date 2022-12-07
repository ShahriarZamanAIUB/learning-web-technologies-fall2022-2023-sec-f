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
                $userid=$row["userid"];   
                $address=$row["address"];
                $balance=$row["balance"];
                $userType=$row["usertype"];    
                 
               
              
            }
            $user["email"]=$email;
            $user["address"]=$address;
            $user["userid"]=$userid;
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

    function checkUsername2($username){
        $con = getConnection();
        $sql = "select * from allusers where username='{$username}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){return true;}
         
        
        else{return false;}
    }

    function checkUsername3($username,$userid){
        $con = getConnection();
        $sql = "select * from allusers where username='{$username}'  and userid!='{$userid}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){return true;}
         
        
        else{return false;}
    }


    function checkEmail2($email){
        $con = getConnection();
        $sql = "select * from allusers where email='{$email}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){return true;}
         
        
        else{return false;}
    }

    function checkEmail3($email,$userid){
        $con = getConnection();
        $sql = "select * from allusers where email='{$email}' and userid!='{$userid}'";
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

        setcookie('userid', $user['userid'], time()+60*60*$hours, '/');

        setcookie('email', $user['email'], time()+60*60*$hours, '/');

        setcookie('userType', $user['userType'], time()+60*60*$hours, '/');

        setcookie('address', $user['address'], time()+60*60*$hours, '/');       

        setcookie('balance', $user['balance'], time()+60*60*$hours, '/');
        
          if($user['userType']=="restaurantOwner" || $user['userType']=="restaurantManager")
        {

            setcookie('restaurantName', $user['restaurantName'], time()+60*60*$hours, '/');

            setcookie('restaurantBalance', $user['restaurantBalance'], time()+60*60*$hours, '/');

            setcookie('restaurantAddress', $user['restaurantAddress'], time()+60*60*$hours, '/');

            setcookie('restaurantID', $user['restaurantID'], time()+60*60*$hours, '/');

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

    function editUser2($selectedUser)
    {   //here the users will be chosen by their id
        $con = getConnection();
        $sql = "update allUsers set  username='{$selectedUser["username"]}', email='{$selectedUser["email"]}', password='{$selectedUser["password"]}', balance={$selectedUser["balance"]}, address='{$selectedUser["address"]}' where  userid={$selectedUser["userid"]}";
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
                $userid=$row["userid"];  
                $address=$row["address"];
                $balance=$row["balance"];
                $userType=$row["usertype"];    
                 
               
              
            }
            $user["email"]=$email;
            $user["userid"]=$userid;
            $user["address"]=$address;
            $user["balance"]=$balance;
            $user["userType"]=$usertype;


            return $user;  

            //return true;
        } 


    }

    function fetchUserByID($id)
    {
        $con = getConnection();
        $sql = "select * from allusers where userid='{$id}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

            while($row = mysqli_fetch_array($result)) {
         
                $username=$row["username"];  
                $password=$row["password"]; 
                $email=$row["email"];
                $userid=$row["userid"];    
                $address=$row["address"];
                $balance=$row["balance"];
                $userType=$row["usertype"];    
                 
               
              
            }
            $user["username"]=$username;  
            $user["password"]=$password; 
            $user["email"]=$email;
            $user["userid"]=$userid;
            $user["address"]=$address;
            $user["userid"]=$userid;
            $user["balance"]=$balance;
            $user["userType"]=$userType;


            return $user;  

            //return true;
        } 

        else{ return false;}



    }


    function nameFetcher($user,$suffix )
    {
        
        $php_destination_name;
        
        
        switch ($user["userType"]) {

         case 'admin':
            $php_destination_name='admin'.$suffix;
          break;

        case 'foodCourtManager':
            $php_destination_name='foodCourtManager'.$suffix;
          break;

        case 'restaurantManager':
            $php_destination_name='restaurantManager'.$suffix;
          break;

        case  'restaurantOwner':
            $php_destination_name='restaurantOwner'.$suffix;
          break;

        case  'customer':
            $php_destination_name='customer'.$suffix;
            break;
           
           
        default:
        $php_destination_name=null;
      }

      return $php_destination_name;;
        
    }


    function deleteUserByID($userid)
    {   //here the users will be chosen by their id
        $con = getConnection();
        $sql = "delete from allusers where  userid={$userid}";
        $status = mysqli_query($con, $sql);

        if($status){ return true;} 
         
        else{return false;}



    }



    function getLatestID()
    {   //here the users will be chosen by their id
        $con = getConnection();
        $sql = "select max(userid) max_userid from allusers";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

            while($row = mysqli_fetch_array($result)) {
         
                 
                $userid=$row["max_userid"];    
                
              
            }
            


            return $userid;  

            //return true;
        } else{ return false;}



    }

    function showAllUsers()
    {

        
        $con = getConnection();
         $sql = "select * from allusers";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Username</th>";  
            echo "<th>Password</th>"; 
            echo "<th>Email</th>";
            echo "<th>User ID</th>";  
            echo "<th>Address</th>";
            echo "<th>Balance</th>";
            echo "<th>Usertype</th>";    
             
            echo "</tr>";

            $rowcount=0;

            
            while($row = mysqli_fetch_array($result)) {
                if($rowcount%2==0)
               { echo "<tr bgcolor='lightblue'>";}

           else{
            echo "<tr bgcolor='white'>";
               }                
                echo "<td align='center' > <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["username"]."</a></td>";  
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["password"]."</a></td>"; 
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["email"]."</a></td>";
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["userid"]."</a></td>";    
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["address"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'> Tk. ".$row["balance"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["usertype"]."</a></td>";    
                 
                echo "</tr>";

                $rowcount++;
              
            }

            echo "</table>";
             
            //return true;
        } 

        else{
            echo "No results found";
        }
    }
?>
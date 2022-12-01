<?php

require_once "db.php";
require_once "userModel.php";

function insertRestaurant($restaurant){

    $con = getConnection();
    $sql = "select max(userid) new_ro_id from allusers";
    $status = mysqli_query($con, $sql);

    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)) {

            $new_ro_id=$row["new_ro_id"];
      
        }
        
          

        $con2 = getConnection();
        $sql2 = "select max(id)+1 new_id from allrestaurants";
        $status2 = mysqli_query($con2, $sql2);
    
        $result2 = mysqli_query($con2, $sql2);
        $count2 = mysqli_num_rows($result2);
        

        if($count2 > 0)
        {
          
            while($row = mysqli_fetch_array($result2)) {

                $new_id=$row["new_id"];
          
            }
           
            if($new_id==null)
            {

                  $new_id=0;


            }

            $con3 = getConnection();
            $sql3 = "insert into allrestaurants values('{$restaurant['name']}', '{$new_id}', '{$restaurant['address']}' , '{$new_ro_id}' , '{$restaurant['balance']}' , '{$restaurant['review']}')";
            $status3 = mysqli_query($con3, $sql3);
    
            if($status3){    return true;} 
             
            else{return false;}



        }

        else{return false;}

    } else{return false;}
}


function fetchLatestRestaurant()
{

    $con = getConnection();
    $sql = "select name from allrestaurants where id=(select max(id) from allrestaurants)";
    $status = mysqli_query($con, $sql);

    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){

        while($row = mysqli_fetch_array($result)) {

            $restaurantName=$row["name"];
      
        }

        return $restaurantName;
    }

    else{ return false;}


}

function checkRestaurantName($restaurant){
    $con = getConnection();
    $sql = "select * from allrestaurants where name='{$restaurant['name']}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){return true;}
    
    else{return false;}
}

function fetchRestaurantNameForOwner($restaurantOwner)
{   $con = getConnection();
    $sql = "select name from allrestaurants where ownerid=(select userid from allusers where username='{$restaurantOwner["username"]}' and email='{$restaurantOwner["email"]}');";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_array($result)) { $restaurantName=$row["name"]; }
        
        
        
        return $restaurantName;}
    
    else{return false;}
}


function fetchRestaurantBalanceForOwner($restaurantOwner)
{   $con = getConnection();
    $sql = "select balance from allrestaurants where ownerid=(select userid from allusers where username='{$restaurantOwner["username"]}' and email='{$restaurantOwner["email"]}');";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_array($result)) { $restaurantBalance=$row["balance"]; }
        
        
        
        return $restaurantBalance;}
    
    else{return false;}
}


function fetchRestaurantAddressForOwner($restaurantOwner)
{   $con = getConnection();
    $sql = "select address from allrestaurants where ownerid=(select userid from allusers where username='{$restaurantOwner["username"]}' and email='{$restaurantOwner["email"]}');";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_array($result)) { $restaurantAddress=$row["address"]; }
        
        
        
        return $restaurantAddress;}
    
    else{return false;}
}




?>
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
        $sql2 = "select nvl(max(id),0)+1 new_id from allrestaurants";
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

function fetchRestaurantIDfromOwnerID($ownerid)
{

    $con = getConnection();
    $sql = "select id from allrestaurants where ownerid={$ownerid}";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_array($result)) { $restaurantID=$row["id"]; }
        
        
        
        return $restaurantID;}
    
    else{return false;}

}


function fetchRestaurantNamefromOwnerID($ownerid)
{

    $con = getConnection();
    $sql = "select name from allrestaurants where ownerid={$ownerid}";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        while($row = mysqli_fetch_array($result)) { $restaurantName=$row["name"]; }
        
        
        
        return $restaurantName;}
    
    else{return false;}

}

function insertRestaurantAndManager($restaurantAndManager)
{
   
    $con = getConnection();
    $sql = "insert into restaurantsandmanagers values('{$restaurantAndManager['restaurantName']}', {$restaurantAndManager["restaurantID"]}, '{$restaurantAndManager["managerName"]}' , {$restaurantAndManager["managerID"]} , '{$restaurantAndManager["managerSalary"]}')";
    $status = mysqli_query($con, $sql);

    if($status){    return true;} 
     
    else{return false;}


}


function showAllRestaurants()
{

    $con=getConnection();
    $sql = "select * from allrestaurants ";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Name</th>";  
            echo "<th>Restaurant ID</th>"; 
            echo "<th>Address</th>";
            echo "<th>Owner ID</th>";  
            
            echo "<th>Balance</th>";
            echo "<th>Review</th>";    
             
            echo "</tr>";

        $rowcount=0;

        
        while($row = mysqli_fetch_array($result)) {
            if($rowcount%2==0)
           { echo "<tr bgcolor='lightblue'>";}

       else{
        echo "<tr bgcolor='white'>";
           }                
           echo "<td align='center' >".$row["name"]."</td>";  
           echo "<td align='center'>".$row["id"]."</td>"; 
           echo "<td align='center'>".$row["address"]."</td>";
           echo "<td align='center'>".$row["ownerid"]."</td>";    
           echo "<td align='center'>".$row["balance"]."</td>";
           echo "<td align='center'>".$row["review"]."</td>";

            
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
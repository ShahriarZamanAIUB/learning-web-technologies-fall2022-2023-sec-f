<?php
  
  require_once "db.php";
   
  function getLatestFoodID()
   { $con=getConnection();
     $sql = "select max(fooditemid) latest_food_id from restaurantsandfooditems";
     $result = mysqli_query($con,$sql);
     $count = mysqli_num_rows($result);
 

    if($count > 0){

        while($row=mysqli_fetch_array($result)) {

            $latest_food_id=$row["latest_food_id"];



        }

        return $latest_food_id;
    
    } else { return false;}


   } 



   function getNewFoodID()
   { $con=getConnection();
     $sql = "select nvl(max(fooditemid),0)+1 new_food_id from restaurantsandfooditems";
     $result = mysqli_query($con,$sql);
     $count = mysqli_num_rows($result);
 

    if($count > 0){

        while($row=mysqli_fetch_array($result)) {

            $new_food_id=$row["new_food_id"];



        }

        return $new_food_id;
    
    } else { return false;}


   } 
    

    function insertFoodItemIntoRestaurant($restaurant_food_record){
        
        $restaurant_food_record["foodItemID"]=getNewFoodID();

        $con = getConnection();
        $sql = "insert into restaurantsandfooditems values('{$restaurant_food_record['restaurantName']}', '{$restaurant_food_record['restaurantID']}', '{$restaurant_food_record['foodItemName']}' , '{$restaurant_food_record['foodItemID']}' , '{$restaurant_food_record['foodItemPrice']}')";
        $status = mysqli_query($con, $sql);

        if($status){ return true;} 
        
        
        
        else{return false;}
    }


     
?>
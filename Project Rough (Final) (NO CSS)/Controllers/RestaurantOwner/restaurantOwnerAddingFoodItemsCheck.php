<?php
session_start();
require_once "../../Models/restaurantModel.php";
require_once "../../Models/userModel.php";
require_once "../../Models/foodItemModel.php";

$restaurant_food_record['restaurantName']=trim($_COOKIE['restaurantName']);
$restaurant_food_record['restaurantID']=trim($_COOKIE['restaurantID']);
$restaurant_food_record['foodItemName']=$_POST['foodItemName'];
$restaurant_food_record['foodItemPrice']=$_POST['foodItemPrice'];
 
/*
 echo $restaurant_food_record['restaurantName']."-------";
 echo $restaurant_food_record['restaurantID']."-------";

 echo $restaurant_food_record['foodItemName']."-------";
 echo $restaurant_food_record['foodItemPrice']."-------";
 
*/
 
 


 

if($restaurant_food_record['restaurantName'] == null || $restaurant_food_record['restaurantID'] == null || $restaurant_food_record['foodItemName'] == null   || $restaurant_food_record['foodItemPrice']==null){
    //echo "Null values"; 
    
    header('location: ../../Views/RestaurantOwner/restaurantOwnerAddingFoodItems.php?err=null');

    
}

else{
    
    
    

    if (insertFoodItemIntoRestaurant($restaurant_food_record)==true)
    {  
         //mkdir("../../Assets/allFoods/".$restaurantName."/"); 

 
         $_SESSION["restaurantOwnerAddingFoodItemsCheck.php"]["foodItemName"]=$restaurant_food_record['foodItemName'];
         $_SESSION["restaurantOwnerAddingFoodItemsCheck.php"]["foodItemPrice"]=$restaurant_food_record['foodItemPrice'];
         $_SESSION["restaurantOwnerAddingFoodItemsCheck.php"]["foodItemID"]=getLatestFoodID();

        header('location: ../../Views/RestaurantOwner/restaurantOwnerChoosingFoodItemImage.php?message=restaurant_added');  
     
    }
//echo "r_f added";
   




}  
?>
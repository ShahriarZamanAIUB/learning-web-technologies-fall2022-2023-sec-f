<?php
session_start();
require_once "../../Models/restaurantModel.php";
require_once "../../Models/userModel.php";

$restaurantName=trim($_POST['restaurantName']);
$restaurantAddress=trim($_POST['restaurantAddress']);
$restaurantBalance=trim($_POST['restaurantBalance']);

$restaurantOwnerName=trim($_POST['restaurantOwnerName']);
$restaurantOwnerEmail=trim($_POST['restaurantOwnerEmail']);
$restaurantOwnerPassword=trim($_POST['restaurantOwnerPassword']);


$user;

$user["username"]=$restaurantOwnerName;
$user["email"]=$restaurantOwnerEmail;
$user["password"]=$restaurantOwnerPassword;
$user["userType"]="restaurantOwner";
$user["balance"]=21000;
$user["address"]=$restaurantAddress;


$restaurant["name"]=$restaurantName;
$restaurant["address"]=$restaurantAddress;
$restaurant["balance"]=$restaurantBalance;
$restaurant["review"]=5;
 


$already_exists=false;

if($restaurantName == "" || $restaurantAddress == "" || $restaurantBalance == "" ||$restaurantOwnerName==""||$restaurantOwnerPassword==""){
    //echo "Null values"; 
    
    header('location: ../../Views/Admin/adminAddingRestaurants.php?err=null');

    
}

else{
    
    
    

    if(checkUsername($user)==true || checkEmail($user)==true || checkRestaurantName($restaurant)==true){
        $already_exists=true;
        header('location: ../../Views/Admin/adminAddingRestaurants.php?err=already_taken');
    }

    else{

if(insertUser($user)==true)
{ 



    if (insertRestaurant($restaurant)==true)
    {  
         mkdir("../../Assets/allFoods/".$restaurantName."/");
        header('location: ../../Views/Admin/adminChoosingRestaurantImage.php?message=restaurant_added');  
     
    }
//echo "ro added";
   

}

}
}
?>
<?php
session_start();
require_once "../../Models/restaurantModel.php";
require_once "../../Models/userModel.php";

 


$restaurantManager;

$restaurantManager["username"]=trim($_POST['restaurantManagerName']);
$restaurantManager["email"]=trim($_POST['restaurantManagerEmail']);
$restaurantManager["password"]=trim($_POST['restaurantManagerPassword']);

$restaurantManager["userType"]="restaurantManager";

$restaurantManager["balance"]=trim($_POST['restaurantManagerBalance']);
$restaurantManager["address"]=trim($_POST['restaurantManagerAddress']);



$restaurantManager["salary"]=trim($_POST['restaurantManagerSalary']);
 

$restaurantAndManager;

$restaurantAndManager["restaurantName"]=fetchRestaurantNamefromOwnerID($_COOKIE["userid"]);
$restaurantAndManager["restaurantID"]=fetchRestaurantIDfromOwnerID($_COOKIE["userid"]);

$restaurantAndManager["managerName"]=$restaurantManager["username"];
$restaurantAndManager["managerSalary"]=$restaurantManager["salary"];
 
 

$already_exists=false;

if($restaurantManager["username"] == null || $restaurantManager["email"]==null || $restaurantManager["password"] == null ||$restaurantManager["balance"]==null ||$restaurantManager["address"]==null){
    //echo "Null values"; 
    
    header('location: ../../Views/restaurantOwner/restaurantOwnerAddingRestaurantManagers.php?err=null');

    
}

else{
    
    
    

    if(checkUsername($restaurantManager)==true || checkEmail($restaurantManager)==true  ){
        $already_exists=true;
        header('location: ../../Views/restaurantOwner/restaurantOwnerAddingRestaurantManagers.php?err=already_taken');
    }

    else{  

if(insertUser($restaurantManager)==true)
{ 

$restaurantAndManager["managerID"]=getLatestID();

    if (insertRestaurantAndManager($restaurantAndManager)==true)
    {  
         
        header('location: ../../Views/restaurantOwner/restaurantOwnerDashboard.php?message=manager_added');  
     
    }
//echo "ro added";
 
 

 
   
 

 

 

  
 

   

}
  
}
}  
?>
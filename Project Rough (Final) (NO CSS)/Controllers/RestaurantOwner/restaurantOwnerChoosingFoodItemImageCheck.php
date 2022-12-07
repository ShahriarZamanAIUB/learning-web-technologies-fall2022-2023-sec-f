<?php 
      session_start();
    //print_r($_FILES);

    $foodItemID=$_SESSION["restaurantOwnerAddingFoodItemsCheck.php"]["foodItemID"];


    require_once "../../Models/restaurantModel.php";
    
    $src = $_FILES['myfile']['tmp_name'];
    
     $des ="../../Assets/allFoods/".$foodItemID.".jpg";  
  
     
      
      

    if(move_uploaded_file($src, $des)){

         
        header('location: ../../Views/RestaurantOwner/restaurantOwnerChoosingFoodItemImage.php?message=restaurant_pic_set_successfully'); 
    }
    
    else{
        header('location: ../../Views/RestaurantOwner/restaurantOwnerChoosingFoodItemImage.php?message=restaurant_pic_setting_failed');
    }  
?>
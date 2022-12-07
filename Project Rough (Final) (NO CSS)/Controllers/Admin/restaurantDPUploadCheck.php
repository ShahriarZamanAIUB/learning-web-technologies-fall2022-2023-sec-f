<?php 
      session_start();
    //print_r($_FILES);
    require_once "../../Models/restaurantModel.php";
    
    $src = $_FILES['myfile']['tmp_name'];
    
     $des ="../../Assets/restaurantDP/".fetchLatestRestaurant().".jpg";  
  
     
      
      

    if(move_uploaded_file($src, $des)){

         
        header('location: ../../Views/Admin/adminChoosingRestaurantImage.php?message=restaurant_pic_set_successfully'); 
    }
    
    else{
        header('location:  ../../Views/Admin/adminDashboard.php?message=restaurant_pic_setting_failed');
    }  
?>
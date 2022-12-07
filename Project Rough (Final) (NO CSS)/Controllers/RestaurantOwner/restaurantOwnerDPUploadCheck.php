<?php 

    //print_r($_FILES);
    
    $src = $_FILES['myfile']['tmp_name'];
    
     
    $des ="../../Assets/restaurantOwnerDP/".$_COOKIE['userid'].".jpg";
      
      

    if(move_uploaded_file($src, $des)){
       
         
        
         header('location: ../../Views/RestaurantOwner/restaurantOwnerViewingProfile.php?message=profile_picture_change_success');
    }
    
    else{
        header('location:  ../../Views/RestaurantOwner/restaurantOwnerViewingProfile.php?message=profile_picture_change_failed');
    }  
?>
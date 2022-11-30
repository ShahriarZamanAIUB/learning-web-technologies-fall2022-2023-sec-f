<?php 

    //print_r($_FILES);
    
    $src = $_FILES['myfile']['tmp_name'];
    
     
    $des ="../../Assets/adminDP/".$_COOKIE['username'].".jpg";
      
      

    if(move_uploaded_file($src, $des)){
       
         header('location: ../../Views/Admin/adminDashboard.php?message=profile_picture_change_success');
    }
    
    else{
        header('location:  ../../Views/Admin/adminDashboard.php?message=profile_picture_change_failed');
    }  
?>
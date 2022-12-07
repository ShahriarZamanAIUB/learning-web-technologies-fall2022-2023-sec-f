<?php 
require_once "../../Models/userModel.php";

session_start();
    //print_r($_FILES);
    
    $src = $_FILES['myfile']['tmp_name'];
    
    $userid=$_SESSION['adminEditingUsers.php']['selectedUserID'];

    $user=fetchUserByID($userid);
    $folder_name=nameFetcher($user,"DP");


    $des ="../../Assets/".$folder_name."/".$user["userid"].".jpg";
      
     

    if(move_uploaded_file($src, $des)){
       
          header('location: ../../Views/Admin/adminEditingUsers.php?id='.$user["userid"]);

         
    }
    
    else{
         header('location:  ../../Views/Admin/adminEditingUsers.php?message=profile_picture_change_failed');

        
    }  
?>
<?php 

    //print_r($_FILES);

    $src = $_FILES['myfile']['tmp_name'];
    $des ="Profile_Picture.jpeg";

     

    if(move_uploaded_file($src, $des)){
        header('location: changeProfilePicture.php?message=profile_picture_change_success');
    }
    
    else{
        header('location: changeProfilePicture.php?message=profile_picture_change_failed');
    }
?>
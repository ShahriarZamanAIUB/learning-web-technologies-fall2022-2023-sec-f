<?php 
    $username = $_POST['username'];
    $password = $_POST['pass'];

    if($username == "" || $password == "" ){
        echo "<h1>Validation failed: One or more fields are empty!</h1>";
    }
	else if(strlen($username)<2){
        echo "<h1>Validation failed: Username must be at least 2 characters long! </h1>";
    }
	 else if((substr_count($username,'@')>0)||(substr_count($username,'#')>0)||(substr_count($username,'$')>0)||(substr_count($username,'%')>0))
	{echo "<h1>Validation failed: Username cannot contain special characters! </h1>";}
	
	else if(strlen($password)<8){
        echo "<h1>Validation failed: Password must be at least 8 characters long! </h1>";
    }
	else if((substr_count($password,'@')<1)&&(substr_count($password,'#')<1)&&(substr_count($password,'$')<1)&&(substr_count($password,'%')<1)){
        echo "<h1>Validation failed: Password must contain the special characters (@, # $, %) </h1>";
    }
	
	else{
        echo "<h1> Validation Successful!  </h1>";
    }

?>

 
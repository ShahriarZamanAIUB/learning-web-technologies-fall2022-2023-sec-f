<?php 
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
	$retyped_pass = $_POST['retyped_pass'];
   
   
   
    if($current_pass=="" || $new_pass=="" || $retyped_pass=="")
	{echo "<h1>One or more fields are empty!</h1>";}
	
    else if($current_pass == $new_pass ){
        echo "<h1>Validation failed: New password matches with the current one!</h1>";
    }
	else if($retyped_pass == $new_pass){
        echo "<h1>Validation Successful: Retyped password matches with the new one </h1>";
    }
	  else{echo "<h1>Validation Failed, none of the passwords match! </h1>";}

?>

 
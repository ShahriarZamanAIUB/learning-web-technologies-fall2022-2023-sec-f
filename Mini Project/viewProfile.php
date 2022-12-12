<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: login.php?err=bad_request');
}

?>



<html>
    <head>
        <title>View Profile</title>
    </head>
    <body>
	 
	<table  style="width:40%">
	
	<tr><td>  
	
	<p style="text-align:right;"> 
       <?php
       if($_COOKIE["userType"]=="admin" || $_COOKIE["userType"]=="Admin")
       {
          echo"<a href='adminDashboard.php'>&nbspDashboard</a>";

       }
       
       else{

        echo"<a href='userDashboard.php'>&nbspDashboard</a>";
       }
       
       
       
       ?>
	<a href="logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr>
	
	<tr><td>
        <fieldset  >
			<legend>View Profile</legend>
         <table border="1">
            
			  
        
 
                <?php echo "Username: ".$_COOKIE['username'];?>  <br><br>
                <?php    echo "Password: ".$_COOKIE['password'];?> <br><br>
                <?php    echo "ID: ".$_COOKIE['ID'];?> <br><br>
                <?php    echo "Email: ".$_COOKIE['email'];?> <br><br>
               
                <?php    echo "User Type: ".$_COOKIE['userType'];?> <br>
					    

        
               
      </table>
		
		</fieldset>
		</td></tr>
		
		<tr>
		 <td>
		<p style="text-align:center;">  
		Copyright © 2022
		</p>
		</td>
		</tr>
		</table>
    </body>
</html>
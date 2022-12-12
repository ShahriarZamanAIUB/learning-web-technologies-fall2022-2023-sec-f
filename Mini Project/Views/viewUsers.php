<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

 

?>



<html>
    <head>
        <title>Admin Viewing Users</title>
    </head>
    <body> <script type="text/javascript" src="../Assets/showAllUsersScript.js"></script>
	 
	<table border="1" style="width:40%">
	
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
	<a href="../Controllers/logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr>
	
	<tr><td>
        <fieldset  >
			<legend>Admin Viewing Users</legend>
        
            
			   

               

            <h2 id="show"> Here<?php echo "<script type='text/javascript'>  showAllUsersUsingAJAX(); </script>"; ?> </h2>
		     
	 
              
               

         
        
		
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
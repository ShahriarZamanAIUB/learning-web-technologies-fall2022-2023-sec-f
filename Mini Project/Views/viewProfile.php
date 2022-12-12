<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
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
	<a href="../Controllers/logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr>
	
	<tr><td>
        <fieldset  >
			<legend>View Profile</legend>
         <table border="1" cellpadding="5">
            
			  
            <tr><td>Username : </td><td> <b> <?php    echo $_COOKIE['username'];?> </b> </td></tr>
            <tr><td>Password :</td><td><b> <?php    echo  $_COOKIE['password'];?>  </b></td></tr>
            <tr><td>ID :</td><td><b> <?php    echo  $_COOKIE['ID'];?> </b></td></tr>
            <tr><td>Email :</td><td><b> <?php    echo  $_COOKIE['email'];?> </b></td></tr>
            <tr><td>User Type :</td><td><b><?php    echo  $_COOKIE['userType'];?></b></td></tr>
  
               
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
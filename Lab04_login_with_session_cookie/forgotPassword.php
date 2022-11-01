<?php 
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.php?err=bad_request');
    }
	 

?> 



<html>
    <head>
        <title>Forgot Password</title>
    </head>
    <body>
	 
	<table border="1">
	
	<tr><td><img src="logo.png" height="60px" width="200px"></img> 
	
	<p style="text-align:right;"> 
	<a href="home.php"> Home</a> 
	<a href="login.php">&nbspLogin</a>
	<a href="registration.php">&nbspRegistration</a>
	
	</p>
	</td>
	
	  </tr>
	
	<tr><td>
        <fieldset style="width:350px">
			<legend>Forgot Password</legend>
        <form method="post" action="forgotPasswordCheck.php" enctype="">
            Enter Email: <input type="email" name="email" value=""/> <br>
             
			 <input type="checkbox" name="checkbox"/>Remember Me<br> <br>
             <input type="submit" name="btn" value="Submit"/>
			  
        </form>
		
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
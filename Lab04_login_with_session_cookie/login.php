<?php

session_start();

?> 



<html>
    <head>
        <title>Log In</title>
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
			<legend>LOGIN</legend>
        <form method="post" action="loginCheck.php" enctype="">
            Username: <input type="text" name="username" value=""/> <br>
            Password: <input type="password" name="password" value=""/> <br>
			 <input type="checkbox" name=""/> Remember Me<br> <br>
             <input type="submit" name="btn" value="Submit"/>
			 <a href=forgotPassword.php>Forgot Password?</a>
        </form>
		
		</fieldset>
		</td></tr>
		
		<tr>
		 <td>
		<p style="text-align:center;">  
		Copyright  © 2022
		</p>
		</td>
		</tr>
		</table>
    </body>
</html>
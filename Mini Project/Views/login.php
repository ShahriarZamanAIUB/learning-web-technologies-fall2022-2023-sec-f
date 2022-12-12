<?php

session_start();

 

?> 



<html>
    <head>
        <title>Log In</title>
    </head>
    <body><script src="../Assets/loginScript.js"></script>
	 
	<table border="1">
	
	<tr><td> 
	
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
        <form method="post" action="../Controllers/loginCheck.php" enctype=""  >
            Username: <input type="text" name="username" ID="username" > <br>
            Password: <input type="password" name="password" ID="password" > <br>
			 <input type="checkbox" name="checkbox"/> Remember Me<br> <br>
             <input type="submit" name="btn" value="Log In"/>
			 <a href=registration.php>Registration</a>
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
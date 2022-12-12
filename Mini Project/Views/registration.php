

<html>
    <head>
        <title>Registration</title>
    </head>
    <body>  <script src="../Assets/registrationScript.js">  </script>
	 
	<table  >
	
	<tr><td>  

    <h1>
    <?php 

if(isset($_GET['err']))
{
    if($_GET['err'] == 'null'){
          echo "Please input all the fields properly!!!";  
    }

   else if($_GET['err'] == 'no_match'){
        echo "Passwords do not match!!!";
    }
  
}     

?> </h1  >
 
	<p style="text-align:right;"> 
	<a href="home.php"> Home</a> 
	<a href="login.php">&nbspLogin</a>
	<a href="registration.php">&nbspRegistration</a>

    

	
	</p>
	</td>
	
	  </tr>
	
	<tr><td> 
	<form method="post" id="submissionForm" action="../Controllers/regCheck.php" enctype="" onsubmit="return checkAll()">
        <fieldset>
            <legend>REGISTRATION</legend>
            <table>
			 
			
			 
			<table >
                <tr>
                    <td>
                        ID:
                       <br>
                        <input type="text" name="ID" ID='ID'  ><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password:
                        <br>
                        <input type="password" name="password" ID="password"><br>
                    </td>
                </tr>
                 
                <tr>
                    <td>
                        Confirm Password:
                        <br>
                        <input type="password" name="confirmPassword" ID="confirmPassword"  ><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Name:
                        <br>
                        <input type="text" name="username" ID="username"  ><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email:
                        <br>
                        <input type="email" name="email" ID="email"   ><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        User Type:
                        <br>
                        <select name="userType" id="userType">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                    
                    </select>
                    </td>
                </tr>

                <tr>
                    <td align='center'><input type='submit' value='Register'></td></tr>
                 
                 
                 
                          
            </table>
			 
			
        </fieldset>
		</form>
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
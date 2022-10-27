<?php

session_start();

if(isset($_GET['err'])){
    if($_GET['err'] == 'null'){
        echo "invalid username/password";
    }}

?>



<html>
    <head>
        <title>View Profile</title>
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
			<legend>Dashboard</legend>
        <form method="post" action="" enctype="">
            
			  <table border="1">

              <tr><td>
                      <ul>

                     <li><a href="dashboard.php">Dashboard</a></li>
                     <li><a href="viewProfile.php">View Profile</a></li>
                     <li><a href="editProfile.php">Edit Profile</a></li>
                     <li><a href="changeProfilePicture.php">Change Profile Picture</a></li>
                     <li><a href="changePassword.php">Change Password</a></li>
                     <li><a href="logOut.php">LogOut</a></li>

                    </ul>
 
              </td>

			  <td>
                
              <fieldset style="width:400px">
              <form method="post" action="passwordChangeCheck.php" enctype=""> 
		      <legend>CHANGE PASSWORD</legend>
			 
		
                                Current Password:<input type="password" name="current_password" value=""/> <br>
          <p style="color:green;">New Password:  <input type="password" name="new_password"     value=""/> </p> 
		  <p style="color:red;">Retype Password :<input type="password" name="retyped_password" value=""/></p>  <br> 
                                                 <input type="submit" name="btn" value="Submit"/>
			  
			 
                                                 </form>	
		</fieldset>
         	    


              </td>
              </tr>

         </table>
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
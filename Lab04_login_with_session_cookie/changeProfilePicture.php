<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: login.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Profile Picture</title>
    </head>
    <body>
	 
	<table border="1" style="width:40%">
	
	<tr><td><img src="logo.png" height="60px" width="200px"></img> 
	
	<p style="text-align:right;"> 
    <?php  echo "Logged in as ".$_SESSION['user']['username']." | " ?>
	<a href="logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr>
	
	<tr><td>
        <fieldset  >
			<legend>Profile Picture</legend>
        
            
			  <table border="1"  style="width:100%">

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
        <fieldset  >   <legend>Profile Picture</legend>
        <img src="Profile_Picture.jpeg" height="120px" width="120px"></img> <br><br>
        <form method="POST" action="uploadCheck.php" enctype="multipart/form-data" >
            Image: <input type="file" name="myfile" value="" />
                <input type="submit" name="submit" value="Submit"/>
        </form>
					    

        </fieldset >
              </td>
              </tr>

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
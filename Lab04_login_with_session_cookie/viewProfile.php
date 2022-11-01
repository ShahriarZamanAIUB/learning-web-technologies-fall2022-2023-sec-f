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
			<legend>View Profile</legend>
        <form method="post" action="" enctype="">
            
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
        <fieldset  >   <legend>Profile</legend>
 
                <?php echo "Username: ".$_SESSION['user']['username'];?>  <br><br>
                <?php    echo "Password: ".$_SESSION['user']['password'];?> <br><br>
                <?php    echo "Email: ".$_SESSION['user']['email'];?> <br><br>
                <?php    echo "Gender: ".$_SESSION['user']['gender'];?> <br><br>
                <?php    echo "Birthday: ".$_SESSION['user']['day'].'/'.$_SESSION['user']['month'].'/'.$_SESSION['user']['year'];?> <br>
					    

        </fieldset >
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
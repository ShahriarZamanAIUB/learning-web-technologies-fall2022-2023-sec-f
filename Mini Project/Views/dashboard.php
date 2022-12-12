<?php 
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: home.php?err=bad_request');
    }

?>



<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
	 
	<table border="1" style="width:40%">
	
	<tr  ><td><img src="logo.png" height="60px" width="200px"></img> 
    <h1>
        <?php 

    if(isset($_GET['message']))
   {
    if($_GET['message'] == 'password_change_success'){
          echo "Password Change Successful";  
    }

   else if($_GET['message'] == 'edit_profile_success'){
    echo "Profile Editing Successful"; 
    }  
   }
?>   </h1>
	
	<p style="text-align:right;"> 
    <?php  echo "Logged in as ".$_SESSION['user']['username']." | " ?>
	<a href="logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr  >
	
	<tr   ><td>
        <fieldset  >
			<legend>Dashboard</legend>
        <form method="post" action="" enctype="">
            
			  <table border="1" style="width:100%">

              <tr><td  >
                      <ul>

                     <li><a href="dashboard.php">Dashboard</a></li>
                     <li><a href="viewProfile.php">View Profile</a></li>
                     <li><a href="editProfile.php">Edit Profile</a></li>
                     <li><a href="changeProfilePicture.php">Change Profile Picture</a></li>
                     <li><a href="changePassword.php">Change Password</a></li>
                     <li><a href="logOut.php">LogOut</a></li>

                    </ul>
 
              </td>

			  <td  >
                <h1> <?php
 
					echo "Weclome, ".$_SESSION['user']['username'];
					?>   </h1>


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
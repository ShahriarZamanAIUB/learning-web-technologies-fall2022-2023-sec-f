<?php 
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.php?err=bad_request');
    }

?>



<html>
    <head>
        <title>Admin Dashboard</title>
    </head>
    <body>
	 
	<table  style="width:40%">
	
	<tr  ><td> 
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
    <?php  echo "Logged in as ".$_COOKIE['username'];?>
	<a href="logout.php">&nbspLogOut</a>
	 
	
	</p>
	</td>
	
	  </tr  >
	
	<tr   ><td>
        <fieldset  >
			<legend>Admin Dashboard</legend>
        <form method="post" action="" enctype="">
            
			  <table border="1" style="width:100%">

              <tr><td align="center">

              <h1>Welcome</h1>
              <h2><a href="viewProfile.php">View Profile</a></h2>
              <h2><a href="viewUsers.php">View Users</a></h2>
              <h2><a href="changePassword.php">Change Password</a></h2>

              <h2><a href="logout.php">Log Out</a></h2>
                      
 
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
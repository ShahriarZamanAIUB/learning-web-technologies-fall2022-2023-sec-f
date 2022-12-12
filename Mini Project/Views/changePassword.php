<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

 

?>



<html>
    <head>
        <title>Change Password</title>
    </head>
    <body><script src="../Assets/changePasswordScript.js"></script>
	 
	<table border="1" style="width:40%">
	
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
			<legend>Change Password</legend>
        
            
			  <table border="1"  style="width:100%">

              <tr> 

			  <td>

               
             <!-- <form method="post" action="changePasswordCheck.php" enctype="" onsubmit="return checkAll()"> -->	
		       
			 
		
                                Current Password:<input type="text" name="current_password" ID="current_password" value="<?php echo $_COOKIE["password"]; ?>"/> <br>
        <p style="color:green;">New Password    :  <input type="password" name="new_password"  ID="new_password"   value=""/> </p> 
		  <p style="color:red;">Retype Password :<input type="password" name="retyped_password" ID="retyped_password"value=""/></p>  <br> 
                                                 <input type="submit" name="btn" value="Change Password" onclick="checkAll()"/>
                                                 <input type="reset" name="reset" value="Reset">
			  
			 
             <!-- </form> -->	
		     
	 
              
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
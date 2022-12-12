<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: login.php?err=bad_request');
}

 

?>



<html>
    <head>
        <title>Change Password</title>
    </head>
    <body>
	 
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
	<a href="logout.php">&nbspLogOut</a>
	 
	
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

    <script>
function checkAll(){    

      
       let current_password = document.getElementById('current_password').value;
       let new_password = document.getElementById('new_password').value;
       let retyped_password= document.getElementById('retyped_password').value;
      
        
       if(current_password=="" || new_password=="" || retyped_password=="")
       { 
       // const form=document.getElementById("submissionForm");

       //form.addEventListener('Submit',(event)=>{
           
           alert("Validation failed, cannot take null values!"); event.preventDefault();  

       // })

       
       }

        else if(new_password!=retyped_password)
        {

          alert("Validation failed, passwords do not match!"); event.preventDefault();  
        }

       else {  //return false;

       alert("Validation Successful");

       let newpassword = {'password': new_password};
            let data = JSON.stringify(newpassword);


            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', 'changePasswordCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('json='+data);
            xhttp.onreadystatechange = function(){
                
                if(this.readyState == 4 && this.status == 200){
                    alert(this.responseText);
                  //  let user = JSON.parse(this.responseText);
                   // document.getElementsByTagName('h1')[0].innerHTML = user.name;

                   if(this.responseText=="Password Change Successful")
                   {

                    document.getElementById('current_password').innerHTML=new_password;

                   }

                   
                }
                
            }


       }


       }

    </script>
    </body>
</html>
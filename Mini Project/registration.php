

<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
	 
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
	<form method="post" id="submissionForm" action="regCheck.php" enctype="" onsubmit="return checkAll()">
        <fieldset>
            <legend>REGISTRATION</legend>
            <table>
			 
			
			 
			<table >
                <tr>
                    <td>
                        ID:
                       <br>
                        <input type="text" name="ID" ID='ID'><br>
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
                        <input type="text" name="username" ID="username"><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email:
                        <br>
                        <input type="email" name="email" ID="email"  ><br>
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

        <script>
 

             
var usernameProblem=true;
var emailProblem=true;
var passwordProblem=true;
var confirmPasswordProblem=true;
var userTypeProblem=true;
 
function isEmpty(str) { return !str.trim().length; }

function hasSpecialCharacters(string)
   {
       if(((string.split('!').length - 1)<1) && ((string.split('@').length - 1)<1) && ((string.split('#').length - 1)<1) && ((string.split('$').length - 1)<1) && ((string.split('%').length - 1)<1))
       {  return false;
       }

       else{return true;}
   }     

   function checkAll(){   

       let username = document.getElementById('username').value; 
       let email = document.getElementById('email').value;
       let ID = document.getElementById('ID').value;
       let password = document.getElementById('password').value;
       let confirmPassword = document.getElementById('confirmPassword').value;
       let userType= document.getElementById('userType').value;
      
        
       if(username=="" || email=="" || password=="" || confirmPassword=="" || userType==="")
       { 
       // const form=document.getElementById("submissionForm");

       //form.addEventListener('Submit',(event)=>{
           
           alert("Validation failed, cannot take null values!"); event.preventDefault();  

       // })

       
       }

       else if(hasSpecialCharacters(username)==true)
       {

        alert("Username cannot have special characters!"); event.preventDefault();  

       }


       else if(password!=confirmPassword)
       {

        alert("Passwords do not match!"); event.preventDefault();  

       }

       else if(hasSpecialCharacters(password)==false)
       {

        alert("Password should have atleast 1 special character!"); event.preventDefault();  

       }


       else if(username.length<3 || username.length>20 )
       {

        alert("Username has to be 3-20 characters!"); event.preventDefault();  

       }

       else if(ID.length<1 ||ID.length>20 )
       {

        alert("ID has to be 1-20 characters!"); event.preventDefault();  

       }

       else if(password.length<8 || username.length>20 )
       {

        alert("Password has to be 8-20 characters!"); event.preventDefault();  

       }


        

       else {  //return false;

       alert("Validation Successful");
       }


       }



 
       </script>
    </body>
</html>
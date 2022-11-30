<?php

session_start();
 

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Customer Editing Profile</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1" style="background-color:#FFFFE0;">
                <!╌Light Yellow/Skin Color ╌>
                    <tr><td align="center"><h1>Edit Your Profile (Customer)</h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                            if($_GET['message'] == 'reg_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your new account, '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'log_in_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome back to your account, '.$_COOKIE['username'].'!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'profile_picture_change_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Profile Picture Changed Successfully!<b></p></td></tr>';  
                            }
 
                            else if($_GET['message'] == 'order_placed'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Order Placed Successfully!<b></p></td></tr>';  
                            }

                            
                            
  
                        } 

                        else if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'restaurant_file_empty'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b> We Are Working On Our Restaurant List, Try Again!<b></p></td></tr>';  
                            }
                        }
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%" style="background-color:#E8F8F5;" > 
                            <!╌Lavender Color ╌>
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="customerDashboard.php">Dashboard</a><br></li>
                     <li><a href="customerChoosingRestaurant.php">Place Order</a><br></li>
                    <?php if(isset($_COOKIE['orderApproved'])) 
            
            { echo "<li><a href='customerReceivingOrder.php'>Recieve Order</a><br></li>";} ?>

                     <li><a href="customerViewingOrderHistory.php">View Order History</a><br></li>
                     <li><a href="customerViewingProfile.php">View Profile</a></li>
                     <li><a href="customerEditingProfile.php">Edit Profile</a></li>
                      
                     
                     <li><a href="logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td>
                        <form method="post" id="submissionForm" action="../../Controllers/Customer/customerEditCheck.php" enctype="" onsubmit="return checkAll()">
                        <table   align="center" width="80%"  style="background-color:#FFFFE0;" cellspacing="8"> <!╌Skin Color ╌ >   
                     
                        

                        <tr><td colspan="2" align="center" colspan="2"> 
                        <?php  if(isset($_COOKIE['username']))
                                    {   if(file_exists("../../Assets/customerDP/".$_COOKIE['username'].".jpg"))
                                                      {echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/customerDP/'.trim($_COOKIE['username']).'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/default_dp.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/default_dp.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                          

                     <tr> <td colspan="2"> <hr>  </td></tr>


                      <tr><td style="padding:10px">Username:    </td><td> <input style="width: 200px; height: 30px;" type="text"     name="username"            ID="username"    value="<?php echo $_COOKIE['username'];?>" placeholder="Username"     onkeyup="usernameCheck()"></td></tr> 
                      <tr><td style="padding:10px">E-mail:      </td><td> <input style="width: 200px; height: 30px;" type="email"    name="email"               ID="email"       value=<?php echo $_COOKIE['email']; ?> placeholder="E-mail"       onkeyup="emailCheck()"> </td></tr> 
                      <tr><td style="padding:10px">Old Password:</td><td> <input style="width: 200px; height: 30px;" type="text"     name="oldPassword"         ID="oldPassword" value=<?php echo $_COOKIE['password']; ?> placeholder="Password"     onkeyup="oldPasswordCheck()"></td></tr>
                      <tr><td style="padding:10px">New Password:</td><td> <input style="width: 200px; height: 30px;" type="text"     name="newPassword"         ID="newPassword" value=<?php echo $_COOKIE['password']; ?> placeholder="New Password" onkeyup="newPasswordCheck()"></td></tr>  
                      <tr><td style="padding:10px">Address:     </td><td> <input style="width: 200px; height: 30px;" type="text"     name="address"             ID="address"     value=<?php echo $_COOKIE['address']; ?> placeholder="Address"      onkeyup="addressCheck()"></td></tr>
                      <tr>
                                     
                                     <td align="center" colspan="2">
                                         <input type="submit" name="" value="Edit Profile"> &nbsp&nbsp&nbsp
                                         <input type="reset" name="" value="Reset">
                                     </td>
                                 </tr>
                      
                                 
                       </table>
                       </form>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2" style="background-color:#FFFFE0;"><a href="../../Controllers/logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <script> 

             
var usernameProblem=false;
var emailProblem=false;
var oldPasswordProblem=false;
var newPasswordProblem=false;
var addressProblem=false;
 
function isEmpty(str) {
           return !str.trim().length;
       }

function hasSpecialCharacters(string)
{
      if(((string.split('!').length - 1)<1) && ((string.split('@').length - 1)<1) && ((string.split('#').length - 1)<1) && ((string.split('$').length - 1)<1) && ((string.split('%').length - 1)<1))
     {  return false;
     }

     else{return true;}


}


function usernameCheck(){  

   //let username = document.getElementById('username').value;
    
   let input = document.getElementById('username');
    
   let username=input.value;
    

    if (hasSpecialCharacters(username)==true)
     { usernameProblem=true;
       
       input.style.backgroundColor = 'Tomato';
     }

     else if(isEmpty(username)){
        usernameProblem=true;    
          
 
   input.style.backgroundColor = 'White';}

     else if(username.length<3){ 
        usernameProblem=true;  
      
   input.style.backgroundColor = 'Tomato';
   }

   else if(username.length>30){ 
    usernameProblem=true;
       

   input.style.backgroundColor = 'Tomato';
   }

     else { usernameProblem=false;
   

    

       input.style.backgroundColor = 'PaleGreen';
   }



    
}

function emailCheck(){  

   let input = document.getElementById('email');
   let email=input.value;



       if(email.length<3){ emailProblem=true;
      
       input.style.backgroundColor = 'Tomato';
       }

       else if(email.length>30){ emailProblem=true;
         
       input.style.backgroundColor = 'Tomato';
       }

       else if(isEmpty(email)){
           emailProblem=true;        
   
   input.style.backgroundColor = 'White';}

        

       else { emailProblem=false;
 

       

       input.style.backgroundColor = 'PaleGreen';
       }


}

function checkAll(){  

   let username = document.getElementById('username').value;
   let email = document.getElementById('email').value;
   let oldPassword = document.getElementById('oldPassword').value;
   let newPassword = document.getElementById('newPassword').value;
   let address = document.getElementById('address').value;

   if(username=="" || email=="" || oldPassword=="" || newPassword=="" || address=="")
   { 
    // const form=document.getElementById("submissionForm");

     //form.addEventListener('Submit',(event)=>{
       
       alert("Validation failed, cannot take null values!"); event.preventDefault();  
   
  // })

      
   }

else if(usernameProblem==true||emailProblem==true||oldPasswordProblem==true||newPasswordProblem==true||addressProblem==true)

{alert("Validation failed, fill up the fields properly!"); event.preventDefault(); }

else {  //return false;

   alert("Validation Successful");
    }


}





function oldPasswordCheck(){ 
   let input = document.getElementById('oldPassword');
   let oldPassword = input.value;
   
    if(oldPassword.length<8){ oldPasswordProblem=true;
        

   input.style.backgroundColor = 'Tomato';
   }

   else if(oldPassword.length>20){ oldPasswordProblem=true;
        

   input.style.backgroundColor = 'Tomato';
   }

    
       

     else if(hasSpecialCharacters(oldPassword)==false)
     { oldPasswordProblem=true;
        
       input.style.backgroundColor = 'Tomato';
     }

     else if(isEmpty(oldPassword)){
       oldPasswordProblem=true;    
    
   input.style.backgroundColor = 'White';}

    else { oldPasswordProblem=false;
   

    const input = document.getElementById('oldPassword');

    input.style.backgroundColor = 'PaleGreen';
   }


}

function newPasswordCheck(){ 
    
   
   let oldPassword = document.getElementById('oldPassword').value;
   let input = document.getElementById('newPassword');
   let newPassword = input.value;
    
    

     
   
    if(isEmpty(newPassword)){
   
       newPasswordProblem=true;
  
   input.style.backgroundColor = 'White';}

   else if(hasSpecialCharacters(newPassword)==false)
     { newPasswordProblem=true;
        
       input.style.backgroundColor = 'Tomato';
     }


   else if(newPassword.length>20){
   
       newPasswordProblem=true;
 
   input.style.backgroundColor = 'Tomato';}

   else if(newPassword.length<8){
   
   newPasswordProblem=true;

input.style.backgroundColor = 'Tomato';}

else{ newPasswordProblem=false;

input.style.backgroundColor = 'PaleGreen';}
     
     


}


function addressCheck(){ 

    
    
   let input = document.getElementById('address');
   let address = input.value;

 

  


   if(isEmpty(address)){
   
   addressProblem=true;
 
    input.style.backgroundColor = 'White';}

    else if(address.length>30){
   
       addressProblem=true;
 
    input.style.backgroundColor = 'Tomato';}

   

    else{ 
       
       addressProblem=false; 
   
       input.style.backgroundColor = 'Palegreen';}
   

    }
</script>
    </body>

     
    </html>
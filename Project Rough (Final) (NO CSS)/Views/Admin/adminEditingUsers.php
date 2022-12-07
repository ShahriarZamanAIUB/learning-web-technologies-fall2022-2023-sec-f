<?php

session_start();

require_once "../../Models/userModel.php";
 

if(!isset($_COOKIE['status'])){
  header('location: ../home.php?err=bad_request');
}

if(isset($_GET['id']))
    {
            $userid=$_GET['id']; 

            $user["userid"]=$userid;
            
            $user=fetchUserByID($userid);

             $_SESSION['adminEditingUsers.php']['selectedUserID']=$userid;
             $_SESSION['adminEditingUsers.php']['selectedUserType']=$user["userType"];   
            
    }

?>



<html>
    <head>
        <title>Admin Editing User Profile</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1" style="background-color:#FFFFE0;">
                <!╌Light Yellow/Skin Color ╌>
                    <tr><td align="center"><h1>Admin Editing User's Profile <?php echo "(".$user["userType"].")"; ?></h1></td></tr>
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

                                    <li><b><a href="adminDashboard.php">Dashboard</a><br></li>
                                    <li><a href="adminAddingRestaurants.php">Add Restaurant</a><br></li>
                                    <li><a href="adminViewingRestaurants.php">View Restaurants</a><br></li>
                                    <li><a href="adminSearchingUsers.php">Search Users</a><br></li>
                                    <li><a href="adminSettingVATRate.php">Set VAT rate</a><br></li>
                                    <li><a href="adminViewingProfile.php">View Profile</a></li>
                                    <li><a href="adminEditingProfile.php">Edit Profile</a></li>

                                    <li><a href="../../Controllers/logOut.php">LogOut</a></b></li>

                                    </ul>
 
                        </td>

                        


                        <td>
                         
                        <table   align="center" width="80%"  style="background-color:#FFFFE0;" cellspacing="8"> <!╌Skin Color ╌ >   
                     
                        

                        <tr><td colspan="2" align="center" colspan="2"> 
                        <?php  
                                   $folder_name=nameFetcher($user,"DP");
                        
                        
                               if(isset($user["userid"]))
                                    {   if(file_exists("../../Assets/".$folder_name."/".$user["userid"].".jpg"))
                                                      {echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/'.$folder_name.'/'.$user["userid"].'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img    style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/default_dp.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/default_dp.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                         <tr> <td align="center" colspan="2"> 
                        <form method="POST" action="../../Controllers/Admin/adminEditingUserDPCheck.php" enctype="multipart/form-data" >
                                Change Profile Picture: <br><br> <input type="file" name="myfile" value="" />
                          <br><input type="submit" name="submit" value="Update"/>
                        </form>
                        <form method="post" id="submissionForm" action="../../Controllers/Admin/adminEditingUsersCheck.php" enctype="" onsubmit="return checkAll()">
                     </td></tr>

                          

                     <tr> <td colspan="2"> <hr>  </td></tr>


                      <tr><td style="padding:10px">Username:    </td><td> <input style="width: 200px; height: 30px;" type="text"     name="username"            ID="username"    value="<?php echo $user["username"];?>" placeholder="Username"     onkeyup="usernameCheck()"   required></td></tr> 
                      <tr><td style="padding:10px">E-mail:      </td><td> <input style="width: 200px; height: 30px;" type="email"    name="email"               ID="email"       value="<?php echo  $user["email"]; ?>" placeholder="E-mail"       onkeyup="emailCheck()" required> </td></tr> 
                      <tr><td style="padding:10px">Password:</td><td> <input style="width: 200px; height: 30px;"     type="text"     name="password"             ID="password" value="<?php echo  $user["password"]; ?>" placeholder="Password"     onkeyup="passwordCheck()" required></td></tr>
                      <tr><td style="padding:10px">Balance (Tk.):</td><td> <input style="width: 200px; height: 30px;" type="number"     name="balance"         ID="balance" value=<?php echo  $user["balance"]; ?> placeholder="Balance" min=0    onkeyup="balanceCheck()" required></td></tr>
                 <!--     <tr><td style="padding:10px">New Password:</td><td> <input style="width: 200px; height: 30px;" type="text"     name="newPassword"         ID="newPassword" value=  placeholder="New Password" onkeyup="newPasswordCheck()"></td></tr>  -->
                      <tr><td style="padding:10px">Address:     </td><td> <input style="width: 200px; height: 30px;" type="text"     name="address"             ID="address"     value='<?php echo  $user["address"]; ?>' placeholder="Address"      onkeyup="addressCheck()" required></td></tr>
                      <tr>
                                     
                                     <td align="center" colspan="2">
                                         <input type="submit" name="" value="Edit Profile" > &nbsp&nbsp&nbsp
                                         <input type="reset" name="" value="Reset"> &nbsp&nbsp&nbsp

                                         <input type="button" name="" value="Delete User" onclick='deleteUser()' >
                                          
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
var passwordProblem=false;
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

function checkAll(){  

let username = document.getElementById('username').value;
let email = document.getElementById('email').value;
let password = document.getElementById('password').value;
let balance = document.getElementById('balance').value;
let address = document.getElementById('address').value;

if(username=="" || email=="" || password=="" || balance==null || address=="")
{ 
 // const form=document.getElementById("submissionForm");

  //form.addEventListener('Submit',(event)=>{
    
    alert("Validation failed, cannot take null values!"); event.preventDefault();  

// })

   
}




else if(usernameProblem==true||emailProblem==true||passwordProblem==true||newPasswordProblem==true||addressProblem==true)
{alert("Validation failed, fill up the fields properly!"); event.preventDefault(); }




else {  //return false;

alert("Validation Successful");
 }


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


   checkUsernameUsingAJAX();
    
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


       checkEmailUsingAJAX();
}

 





function passwordCheck(){ 
   let input = document.getElementById('password');
   let password = input.value;
   
    
    if(isEmpty(password)){
       passwordProblem=true;    
    
   input.style.backgroundColor = 'White';}
   
   else if(password.length<8){ passwordProblem=true;
        

   input.style.backgroundColor = 'Tomato';
   }

   else if(password.length>20){ passwordProblem=true;
        

   input.style.backgroundColor = 'Tomato';
   }

    
       

     else if(hasSpecialCharacters(password)==false)
     { passwordProblem=true;
        
       input.style.backgroundColor = 'Tomato';
     }

      

    else { passwordProblem=false;
   

    const input = document.getElementById('password');

    input.style.backgroundColor = 'PaleGreen';
   }


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

     
        

function checkUsernameUsingAJAX(){  

    let userid=<?php echo $user["userid"]; ?>;
  //  alert(userid);
    let username = document.getElementById("username").value;
    let input = document.getElementById('username');
    let xhttp = new XMLHttpRequest();

    
        

    xhttp.open('POST', '../../Controllers/Admin/checkInputValues.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('username='+username);
  // xhttp.send('userid='+userid);

  
    
    xhttp.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){    
            // alert(this.responseText);
           // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;

          // alert(this.responseText);

          if(this.responseText=="Username already taken")
          {   
            alert("Username already taken");
            
            usernameProblem=true;

            input.style.backgroundColor = 'Tomato';
        
        }
           
        }
        
    }
}

function checkEmailUsingAJAX()
{

    let email = document.getElementById("email").value;
    let input = document.getElementById('email');
    let xhttp = new XMLHttpRequest();

    
        

    xhttp.open('POST', '../../Controllers/Admin/checkInputValues.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('email='+email);
     
    
    xhttp.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){    
            // alert(this.responseText);
           // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;

          // alert(this.responseText);

          if(this.responseText=="Email already taken")
          {  
            
            
            alert("Email already taken");

            emailProblem=true;

            input.style.backgroundColor = 'Tomato'; 
        
        }
           
        }
        
    }


}


function deleteUser( ) {
           let userid = <?php echo $user["userid"]; ?>;

           
           const response = confirm("Delete this user? ID= "+userid);

           if (response) {

             
                     
                            let xhttp = new XMLHttpRequest();
                
                            xhttp.open('POST', '../../Controllers/Admin/adminDeletingUsersCheck.php', true);
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send('userid='+userid);

                           // alert("Ok was pressed");
                            
                            
                            xhttp.onreadystatechange = function(){
                                
                                if(this.readyState == 4 && this.status == 200){    
                                    // alert(this.responseText);
                                // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;

                                // alert(this.responseText);

                               // if(this.responseText=="Deleted")
                               // {  
                                    
                                    
                                    alert(this.responseText);

                                    document.location = 'adminSearchingUsers.php?message=selected_user_deleted';



                                    
                                
                               // }
                                
                                }
                                
                            }       
                } 
                
                
                else {
                    alert("Deletion Cancelled!");
                }
       }
   
</script>
    </body>

     
    </html>
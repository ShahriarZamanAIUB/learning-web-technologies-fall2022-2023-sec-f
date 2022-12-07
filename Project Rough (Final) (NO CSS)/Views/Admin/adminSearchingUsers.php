<?php

session_start();

require_once "../../Models/userModel.php";

if(!isset($_COOKIE['status'])){
  header('location: ../home.php?err=bad_request');
}

 
?>



<html>
    <head>
        <title >Admin Dashboard</title>
    </head>
    <body>
        

    
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="1300px"  border="1">
                    <tr><td align="center"><h1>Admin Searching Users</h1></td></tr>
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

                            else if($_GET['message'] == 'restaurant_added'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Restaurant Added Successfully!<b></p></td></tr>';  
                            }

                            
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="left" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%"  >
                                 
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

                        


                        <td align="center" valign="top">
                        <table   width="100%"    >    
                      <tr ><th colspan="2" align="center"  > 
                         <br> Search User:  <input type="text"  name="typedText" ID="typedText" onkeyup="searchUsersUsingAJAX()">
                         <input type="button"  name="searchButton" ID="searchButton" value="Search" onclick="searchUsersUsingAJAX()"> <br> </input>
                         </th></tr>

                          

                     <tr> <td colspan="2"> <hr>  </td></tr>

                     <tr> <td colspan="2" align="center">  <h2  ID="here"><?php echo showAllUsers(); ?></h2>  </td></tr> <!-- Result -->
 
               

                       </table>
                       </td>
                    </tr>  <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                <tr align="center">
                                    <td colspan="2"><a href="../../Controllers/logOut.php"><p  style="color:red; font-size:20px;"><b>Log Out<b></p></a></td>
                                </tr>
                                 
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <script>
 

        function searchUsersUsingAJAX(){  
            let typedText = document.getElementById("typedText").value;
            let xhttp = new XMLHttpRequest();

            
             

            xhttp.open('POST', '../../Controllers/Admin/adminSearchingUsersCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('typedText='+typedText);
           
            xhttp.onreadystatechange = function(){
                
                if(this.readyState == 4 && this.status == 200){    
                    // alert(this.responseText);
                    document.getElementsByTagName("h2")[0].innerHTML = this.responseText;
                }
                
            }
        }
    </script>
    </body>

    


    </html>
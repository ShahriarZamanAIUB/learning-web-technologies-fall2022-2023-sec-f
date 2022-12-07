<?php

session_start();

if(!isset($_COOKIE['status'])){
  header('location: ../home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Restaurant Owner Adding Managers</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Add Managers<p style="color:green">(Restaurant Owner)</p></h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        {
                            if($_GET['message'] == 'reg_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome to your new account!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'log_in_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Welcome back to your account!<b></p></td></tr>';  
                            }

                            else if($_GET['message'] == 'profile_picture_change_success'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Profile Picture Changed Successfully!<b></p></td></tr>';  
                            }

                             

                            
  
                        } 


                        if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Please Input All The Fields Properly!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'already_taken'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Username/Email Already Registered!<b></p></td></tr>';  
                            }
   
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                                <ul style="line-height:250%">

                            <li><b><a href="restaurantOwnerDashboard.php">Dashboard</a><br></li>
                            <li><a href="restaurantOwnerAddingRestaurantManagers.php">Add Managers</a><br></li>
                            <li><a href="restaurantOwnerAddingFoodItems.php">Add Food Item</a><br></li>
                            <li><a href="restaurantOwnerViewingMenu.php">View Menu</a><br></li>
                            <li><a href="restaurantOwnerViewingOrders.php">Approve Orders</a><br></li>
                            <li><a href="restaurantOwnerViewingProfile.php">View Profile</a></li>
                            <li><a href="editProfile.php">Edit Profile</a></li>
                            <li><a href="../../Controllers/logOut.php">LogOut</a></b></li>

                            </ul>

 
                            </td>

                        


                        <td>
                        <table border="1" align="center">    
                      

                      <form method="post" action="../../Controllers/restaurantOwner/restaurantOwnerAddingRestaurantManagersCheck.php" enctype="" >  
                      
                     <tr> <td colspan="2" align="center"><h2> Enter Info of The New Manager  <h2>  </td></tr>
                     <tr> <td colspan="2"> <hr>  </td></tr>

                   




 
                      <tr><td style="padding:10px">Manger Userame: </td><td>     <input style="width: 230px; height: 30px;" type="text"      name="restaurantManagerName"     ID="restaurantManagerName"      value=""       placeholder="Restaurant Manager's Name"> </td> </tr>
                      <tr><td style="padding:10px">Manger E-mail:  </td><td>     <input style="width: 230px; height: 30px;" type="email"      name="restaurantManagerEmail"    ID="restaurantManagerEmail"     value=""       placeholder="Restaurant Manager's E-mail"> </td> </tr>
                      <tr><td style="padding:10px">Manger Password: </td><td>    <input style="width: 230px; height: 30px;" type="password"  name="restaurantManagerPassword" ID="restaurantManagerPassword"  value=""       placeholder="Restaurant Manager's Password"> </td> </tr>
                      <tr><td style="padding:10px">Manger Balance: </td><td>    <input style="width: 230px; height: 30px;" type="number"     name="restaurantManagerBalance"  ID="restaurantManagerBalance"   value=""       placeholder="Restaurant Manager's Balance"> </td> </tr>
                      <tr><td style="padding:10px">Manger Salary: </td><td>    <input style="width: 230px; height: 30px;" type="number"      name="restaurantManagerSalary"   ID="restaurantManagerSalary"    value=""       placeholder="Restaurant Manager's Salary"> </td> </tr>
                      <tr><td style="padding:10px">Manger Address: </td><td>    <input style="width: 230px; height: 30px;" type="text"       name="restaurantManagerAddress"  ID="restaurantManagerAddress"   value=""       placeholder="Restaurant Manager's Address"> </td> </tr>
                     
                      <tr><td align="center" colspan="2" style="padding:10px"> <input type="submit" name="" value="Register"> &nbsp <input type="reset" name="" value="Reset"> </td></tr>
                      </form>
                    </table>
                       </td>
                    </tr>
                                
                                 
                               

                                 

                                 
                                
                                

                                

                                <tr>
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
         
    </body>
    </html>
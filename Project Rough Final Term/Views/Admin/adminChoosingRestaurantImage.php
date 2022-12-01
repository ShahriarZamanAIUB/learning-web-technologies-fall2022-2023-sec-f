<?php

session_start();
require_once "../../Models/restaurantModel.php";

if(!isset($_COOKIE['status'])){
  header('location: home.php?err=bad_request');
}

?>



<html>
    <head>
        <title>Set Restaurant Image</title>
    </head>
    <body>
        
            <fieldset>
                <legend><p  style="font-size:20px;">Food Court Management System</p></legend>
                <table align="center" height="700px" width="800px"  border="1">
                    <tr><td align="center"><h1>Add Restaurant Image <p  style="color:green;">(<?php echo fetchLatestRestaurant(); ?>)</p></h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['message']))
                        { 
                            
                            if($_GET['message'] == 'restaurant_added'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Now set Logo/Image for this Restaurant<b></p></td></tr>';  
                            }


                            else if($_GET['message'] == 'restaurant_pic_set_successfully'){
                                echo '<tr><td align="center"><p  style="color:green; font-size:20px;"><b>Restaurant Image Set Successfully!<b></p></td></tr>';  
                            }

                          
  
                        } 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="100%" height="100%"  >
                        
                                
                                 
                                <tr>
                                <td width="30%">
                      <ul style="line-height:250%">

                      <li><b><a href="adminDashboard.php">Dashboard</a><br></li>
                     <li><a href="adminAddingRestaurants.php">Add Restaurant</a><br></li>
                     <li><a href="adminViewingRestaurants.php">View Restaurants</a><br></li>
                     <li><a href="adminSettingVATRate.php">Set VAT rate</a><br></li>
                     <li><a href="adminViewingProfile.php">View Profile</a></li>
                     <li><a href="adminEditingProfile.php">Edit Profile</a></li>
                     
                     <li><a href="../../Controllers/logOut.php">LogOut</a></b></li>

                    </ul>
 
                        </td>

                        


                        <td align="center" >
                        <table border="1" >    
                      <tr><td colspan="2" align="center" > 
                      <?php  if(fetchLatestRestaurant())
                                    {   if(file_exists("../../Assets/restaurantDP/".fetchLatestRestaurant().".jpg"))
                                                      {echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/restaurantDP/'.fetchLatestRestaurant().'.jpg?t='.time().'" height="120px" width="120px"></img><br><br>';} 
                            
                                      else{            echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/Blank.jpg" height="120px" width="120px"></img><br><br>';    }
                                    }

                                 else{echo '<img  style="border:5px solid #000000; padding:3px; margin:5px"; src="../../Assets/Blank.jpg" height="120px" width="120px"></img><br><br>';}   
                        
                        ?> 
                         </td></tr>

                         <tr> <td align="center"> 
                        <form method="POST" action="../../Controllers/Admin/restaurantDPUploadCheck.php" enctype="multipart/form-data" >
                                Change Restaurant Logo:  <input type="file" name="myfile" value="" />
                         <br>    <br> <input type="submit" name="submit" value="Set Image"/>
                        </form>
                     </td></tr>

                      
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
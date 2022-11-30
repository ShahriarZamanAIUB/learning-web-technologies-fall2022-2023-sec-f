<?php
     session_start();
     $_SESSION['user']['userType']="customer";

     
 
 

?>

 

<html>
    <head>
        <title>Customer Registration</title>
    </head>
    <body>
        <form method="post" id="submissionForm" action="../../Controllers/Customer/customerRegCheck.php" enctype="" onsubmit="return checkAll()">
            <fieldset>
                <legend><p  style="font-size:20px;">Welcome To Food Court Management System</p></legend>
                <table align="center" height="700px" width="700px"  border="1">
                    <tr><td align="center"><h1>Customer Registration</h1></td></tr>
                    <tr><td><hr></td></tr>

                   <?php
                        if(isset($_GET['err']))
                        {
                            if($_GET['err'] == 'null'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Input the fields properly!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'passwords_unmatched'){
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Passwords do not match!<b></p></td></tr>';  
                            }

                            else if($_GET['err'] == 'already_taken'){
                            
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Username/Email already registered by someone else!<b></p></td></tr>';  

                            }

                            else if($_GET['err'] == '|_instance'){
                            
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Use of "|" not allowed!<b></p></td></tr>';  

                            }

                            else if($_GET['err'] == 'spchr_instance'){
                            
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Username cannot include special characters!<b></p></td></tr>';  

                            }

                            else if($_GET['err'] == 'password_too_short'){
                            
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Password has to be 8 characters long at least!<b></p></td></tr>';  

                            }

                            else if($_GET['err'] == 'password_lacks_spchr'){
                            
                                echo '<tr><td align="center"><p  style="color:red; font-size:20px;"><b>Error: Password has to contain these characters (@,#,$,%)!<b></p></td></tr>';  

                            }
  
                        } 

                          echo '<tr><td align="center"> <p  style="color:red; font-size:20px;"> <h2> </h2></p> </td></tr>'; 
                      ?>

                     

                    <tr>
                        <td>
                            <table align="center" border="1" width="500px"   >
                        
                                
                                <td colspan="2" >  <p  style="font-size:20px;"><b>Please Enter Your Information:  </b> </p></td>
                                </tr>
                                <tr><td colspan="2"><hr></td></tr>
                                <tr>
                                    <td  style="padding:10px">
                                    <b> Username:</b>
                                    </td>
                                    <td>
                                    <input style="width: 200px; height: 30px;" type="text" name="username" ID="username" value="" placeholder="Username" uonkeyp="usernameCheck()"> 
                                    </td>
                                </tr>
                                
                                <tr >
                                    <td style="padding:10px">
                                    <b>  Email:</b>
                                    </td>
                                    <td>
                                    <input style="width: 200px; height: 30px;" type="email" name="email" ID="email"  value="" placeholder="E-mail"  onkeyup="emailCheck()"> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:10px">
                                    <b>   Password:</b>
                                    </td>
                                    <td>
                                     <input style="width: 200px; height: 30px;" type="password" name="password" ID="password" value="" placeholder="Password" onkeyup="passwordCheck()"> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="padding:10px">
                                    <b> Retype Password:</b>
                                    </td>
                                    <td >
                                    <input style="width: 200px; height: 30px;" type="password" name="retypedPassword" ID="retypedPassword" value="" placeholder="Retype Password" onkeyup="retypedPasswordCheck()">
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:10px">
                                    <b> Address:</b>
                                    </td>
                                    <td>
                                    <input style="width: 200px; height: 30px;" type="text" name="address" value="" ID="address" placeholder="Address" onkeyup="addressCheck()">
                                    </td>
                                </tr>
                                
                               

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                 
                                
                                

                                <tr>
                                     
                                    <td align="center" colspan="2">
                                        <input type="submit" name="" value="Register"> &nbsp
                                        <input type="reset" name="" value="Reset">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>

                                 
                                <tr align="center">
                                    <td colspan="2"><a href="../home.php">Home Page</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>  
        
        <script>

             
         var usernameProblem=true;
         var emailProblem=true;
         var passwordProblem=true;
         var retypedPasswordProblem=true;
         var addressProblem=true;
          
         function isEmpty(str) {
                    return !str.trim().length;
                }



         function usernameCheck(){  

            //let username = document.getElementById('username').value;
            let input = document.getElementById('username');
            let username=input.value;

             if(((username.split('!').length - 1)>0) || ((username.split('@').length - 1)>0) || ((username.split('#').length - 1)>0) || ((username.split('$').length - 1)>0) || ((username.split('%').length - 1)>0))
              { usernameProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
                document.getElementsByTagName('h2')[0].innerHTML = "Warning: Username cannot have special characters (!,@,#,$,%)!";
                input.style.backgroundColor = 'Tomato';
              }

              else if(isEmpty(username)){
                usernameProblem=true;    
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Username null!";
            input.style.backgroundColor = 'White';}

              else if(username.length<3){ usernameProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Username too short!";
            input.style.backgroundColor = 'Tomato';
            }

            else if(username.length>30){ usernameProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Username too long!";

            input.style.backgroundColor = 'Tomato';
            }

              else { usernameProblem=false;
             document.getElementsByTagName('h2')[0].innerHTML = "no problem";

             

                input.style.backgroundColor = 'PaleGreen';
            }

         

             
         }

         function emailCheck(){  

            let input = document.getElementById('email');
            let email=input.value;

  

                if(email.length<3){ emailProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
                document.getElementsByTagName('h2')[0].innerHTML = "Warning: Email too short!";
                input.style.backgroundColor = 'Tomato';
                }

                else if(email.length>30){ emailProblem=true;
                 document.getElementsByTagName('h2')[0].style.color = "red";
                document.getElementsByTagName('h2')[0].innerHTML = "Warning: Email too long!";
                input.style.backgroundColor = 'Tomato';
                }

                else if(isEmpty(email)){
                    emailProblem=true;        
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Email is null!";
            input.style.backgroundColor = 'White';}

                 

                else { emailProblem=false;
                document.getElementsByTagName('h2')[0].innerHTML = "no problem";

                

                input.style.backgroundColor = 'PaleGreen';
                }


}

         function checkAll(){  

            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let retypedPassword = document.getElementById('retypedPassword').value;
            let address = document.getElementById('address').value;

            if(username=="" || email=="" || password=="" || retypedPassword=="" || address=="")
            { 
             // const form=document.getElementById("submissionForm");

              //form.addEventListener('Submit',(event)=>{
                
                alert("Validation failed, cannot take null values!"); event.preventDefault();  
            
           // })
 
               
            }

       else if(usernameProblem==true||emailProblem==true||passwordProblem==true||retypedPasswordProblem==true||addressProblem==true)
       
       {alert("Validation failed, fill up the fields properly!"); event.preventDefault(); }

        else {  //return false;

            alert("Validation Successful");
             }


         }

   

         

        function passwordCheck(){ 
            let input = document.getElementById('password');
            let password = input.value;
            
             if(password.length<8){ passwordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password too short!";

            input.style.backgroundColor = 'Tomato';
            }

            else if(password.length>20){ passwordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password too long!";

            input.style.backgroundColor = 'Tomato';
            }

             
                

              else if(((password.split('!').length - 1)<1) && ((password.split('@').length - 1)<1) && ((password.split('#').length - 1)<1) && ((password.split('$').length - 1)<1) && ((password.split('%').length - 1)<1))
              { passwordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
                document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password has no special characters!";
                input.style.backgroundColor = 'Tomato';
              }

              else if(isEmpty(password)){
                passwordProblem=true;    
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password is null!";
            input.style.backgroundColor = 'White';}

             else { passwordProblem=false;
             document.getElementsByTagName('h2')[0].innerHTML = "no problem";

             const input = document.getElementById('password');

             input.style.backgroundColor = 'PaleGreen';
            }
 

        }

        function retypedPasswordCheck(){ 
             
            
            let password = document.getElementById('password').value;
            let input = document.getElementById('retypedPassword');
            let retypedPassword = input.value;
             
             
         
             if(retypedPassword==password && !isEmpty(retypedPassword) ){ retypedPasswordProblem=false;
            
                document.getElementsByTagName('h2')[0].innerHTML = "no problem";

                const input = document.getElementById('retypedPassword');

                input.style.backgroundColor = 'PaleGreen';
            }
            
            else if(isEmpty(retypedPassword)){
            
                retypedPasswordProblem=true;
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Retyped Password is null!";
            input.style.backgroundColor = 'White';}

            else if(retypedPassword.length>20){
            
                retypedPasswordProblem=true;
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Retyped Password is too long!";
            input.style.backgroundColor = 'Tomato';}
              
             else {  retypedPasswordProblem=true;
             document.getElementsByTagName('h2')[0].innerHTML = "Warning: Passwords do not match!";
             input.style.backgroundColor = 'Tomato';
            }
 

        }


        function addressCheck(){ 

             
             
            let input = document.getElementById('address');
            let address = input.value;

            document.getElementsByTagName('h2')[0].innerHTML = address;

           
 

            if(isEmpty(address)){
            
            addressProblem=true;
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Address is null!";
             input.style.backgroundColor = 'White';}

             else if(address.length>30){
            
                addressProblem=true;
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Address too long!";
             input.style.backgroundColor = 'Tomato';}

            

             else{ 
                
                addressProblem=false; 
                document.getElementsByTagName('h2')[0].innerHTML = "no problem";
                input.style.backgroundColor = 'Palegreen';}
            

             }
    </script>
    </body>
    </html>
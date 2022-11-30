 

             
         var usernameProblem=true;
         var emailProblem=true;
         var oldPasswordProblem=true;
         var newPasswordProblem=true;
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
            let oldPassword = document.getElementById('oldPassword').value;
            let newPassword = document.getElementById('newPassword').value;
            let address = document.getElementById('address').value;

            if(username=="" || email=="" || oldPassword=="" || retypedPassword=="" || address=="")
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
            
             if(password.length<8){ oldPasswordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password too short!";

            input.style.backgroundColor = 'Tomato';
            }

            else if(password.length>20){ oldPasswordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password too long!";

            input.style.backgroundColor = 'Tomato';
            }

             
                

              else if(((password.split('!').length - 1)<1) && ((password.split('@').length - 1)<1) && ((password.split('#').length - 1)<1) && ((password.split('$').length - 1)<1) && ((password.split('%').length - 1)<1))
              { oldPasswordProblem=true;
                document.getElementsByTagName('h2')[0].style.color = "red";
                document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password has no special characters!";
                input.style.backgroundColor = 'Tomato';
              }

              else if(isEmpty(password)){
                oldPasswordProblem=true;    
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Password is null!";
            input.style.backgroundColor = 'White';}

             else { oldPasswordProblem=false;
             document.getElementsByTagName('h2')[0].innerHTML = "no problem";

             const input = document.getElementById('oldPassword');

             input.style.backgroundColor = 'PaleGreen';
            }
 

        }

        function newPasswordCheck(){ 
             
            
            let oldPassword = document.getElementById('oldPassword').value;
            let input = document.getElementById('newPassword');
            let newPassword = input.value;
             
             
         
             if(!isEmpty(newPassword) ){ newPasswordProblem=false;
            
                document.getElementsByTagName('h2')[0].innerHTML = "no problem";

                const input = document.getElementById('newPassword');

                input.style.backgroundColor = 'PaleGreen';
            }
            
            else if(isEmpty(newPassword)){
            
                newPasswordProblem=true;
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Retyped Password is null!";
            input.style.backgroundColor = 'White';}

            else if(newPassword.length>20){
            
                newPasswordProblem=true;
            document.getElementsByTagName('h2')[0].style.color = "red";
            document.getElementsByTagName('h2')[0].innerHTML = "Warning: Retyped Password is too long!";
            input.style.backgroundColor = 'Tomato';}
              
             else {  newPasswordProblem=true;
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
 
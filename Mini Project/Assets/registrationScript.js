
             
 
 
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


       function checkUsernameUsingAJAX(){  

                        
        //  alert(userid);
        let username = document.getElementById("username").value;
        let input = document.getElementById('username');
        let xhttp = new XMLHttpRequest();


         

        xhttp.open('POST', 'checkInputValues.php', true);
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
                
                //input.style.backgroundColor = 'Tomato'; 
                alert("Username already taken");
                
                usernameProblem=true;
            
            }else{ usernameProblem=false;}
            
            }
            
        }   
        }


        function checkEmailUsingAJAX(){  

                        
            //  alert(userid);
            let username = document.getElementById("email").value;
            let input = document.getElementById('email');
            let xhttp = new XMLHttpRequest();
    
    
             
    
            xhttp.open('POST', 'checkInputValues.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('email='+email);
            // xhttp.send('userid='+userid);
    
            
    
            xhttp.onreadystatechange = function(){  
                
                if(this.readyState == 4 && this.status == 200){    
                    // alert(this.responseText);
                // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;
    
                // alert(this.responseText);
    
                 
    
                if(this.responseText=="Email already taken")
                {  
                    
                    //input.style.backgroundColor = 'Tomato'; 
                    alert("Email already taken");
                    
                    emailProblem=true;
                
                }else{ emailProblem=false;}
                
                }
                
            }   
            }


            function checkIDUsingAJAX(){  

                        
                  
                let username = document.getElementById("ID").value;
                let input = document.getElementById('ID');
                let xhttp = new XMLHttpRequest();
        
        
                 
        
                xhttp.open('POST', 'checkInputValues.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('ID='+ID);
                // xhttp.send('userid='+userid);
        
                
        
                xhttp.onreadystatechange = function(){  
                    
                    if(this.readyState == 4 && this.status == 200){    
                        // alert(this.responseText);
                    // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;
        
                    // alert(this.responseText);
        
                     
        
                    if(this.responseText=="ID already taken")
                    {  
                        
                        //input.style.backgroundColor = 'Tomato'; 
                        alert("ID already taken");
                        
                        idProblem=true;
                    
                    }else{    idProblem=false;}
                    
                    }
                    
                }   
                }

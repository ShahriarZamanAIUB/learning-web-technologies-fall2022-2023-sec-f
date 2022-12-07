 

             
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
          { input.style.backgroundColor = 'Tomato'; 
            alert("Username already taken");
            
            usernameProblem=true;
        
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
          { input.style.backgroundColor = 'Tomato'; 
            
            
            alert("Email already taken");

            emailProblem=true;
        
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
   
 
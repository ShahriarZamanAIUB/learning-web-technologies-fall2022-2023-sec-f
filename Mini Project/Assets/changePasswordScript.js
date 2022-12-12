 

function hasSpecialCharacters(string)
   {
       if(((string.split('!').length - 1)<1) && ((string.split('@').length - 1)<1) && ((string.split('#').length - 1)<1) && ((string.split('$').length - 1)<1) && ((string.split('%').length - 1)<1))
       {  return false;
       }

       else{return true;}
   } 


function checkAll(){    

      
       let current_password = document.getElementById('current_password').value;
       let new_password = document.getElementById('new_password').value;
       let retyped_password= document.getElementById('retyped_password').value;
      
        
       if(current_password=="" || new_password=="" || retyped_password=="")
       { 
       // const form=document.getElementById("submissionForm");

       //form.addEventListener('Submit',(event)=>{
           
           alert("Validation failed, cannot take null values!"); event.preventDefault();  

       // })

       
       }

        else if(new_password!=retyped_password)
        {

          alert("Validation failed, passwords do not match!"); event.preventDefault();  
        }

        else if(new_password.length<8 || new_password.length>20 )
       {

        alert("Password has to be 8-20 characters!"); event.preventDefault();  

       }

       else if(hasSpecialCharacters(new_password)==false)
       {

        alert("Password should have atleast 1 special character!"); event.preventDefault();  

       }

       else {  //return false;

       

       let newpassword = {'password': new_password};
            let data = JSON.stringify(newpassword);


            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../Controllers/changePasswordCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('json='+data); alert("Validation Successful");
            xhttp.onreadystatechange = function(){
                
                if(this.readyState == 4 && this.status == 200){
                     
                  alert(this.responseText);
                  document.getElementById('current_password').value=new_password;

                   

                   
                }
                
            }


       }


       }

   
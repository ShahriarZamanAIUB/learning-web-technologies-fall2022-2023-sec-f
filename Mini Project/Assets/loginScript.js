
function checkLogin(){ window.location.assign("registration.php");
let username=document.getElementById("username").value;
let password=document.getElementById("password").value;

 if(username=="" || password==""){alert("Null Values");}


 else{

     let user= {'username':username,'password': password};
     let data = JSON.stringify(user);


     let xhttp = new XMLHttpRequest();
     xhttp.open('POST', 'loginCheck.php', true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send('json='+data);
     xhttp.onreadystatechange = function(){
         
         if(this.readyState == 4 && this.status == 200){
              
           alert(this.responseText);
        

            

            
         }else{event.preventDefault();  }
         
     }

}}
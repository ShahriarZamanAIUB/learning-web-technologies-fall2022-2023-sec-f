

function showAllUsersUsingAJAX(){  
                                     
    let xhttp = new XMLHttpRequest();

       
     

    xhttp.open('POST', '../Controllers/showingUsersToAdminCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('typedText=Hello');
     
    xhttp.onreadystatechange = function(){  
        
        if(this.readyState == 4 && this.status == 200){       
              //alert(this.responseText);
           
           // document.getElementsByTagName("h2")[0].innerHTML = this.responseText;

            document.getElementById("show").innerHTML=this.responseText;
        }
        
    }
}
 
 

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
  
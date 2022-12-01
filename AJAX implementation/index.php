<html>
<head>
    <title>Document</title>
</head>
<body>
     
    <h2>Search users</h2>
    <input type="text" name="name" id="typedText" value="" onkeyup="ajax()"/>
    <input type="button" name="btn" value="Click" onclick="ajax()" />
    <input type="button" name="btn" value="Test" onclick="alert('test')" />

    <h1>Results</h1>

    <script>
        

        function ajax(){
            let typedText = document.getElementById('typedText').value;
            let xhttp = new XMLHttpRequest();
            

            xhttp.open('POST', 'nameCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('typedText='+typedText);
            xhttp.onreadystatechange = function(){
                
                if(this.readyState == 4 && this.status == 200){
                    //alert(this.responseText);
                    document.getElementsByTagName('h1')[0].innerHTML = this.responseText;
                }
                
            }
        }
    </script>
</body>
</html>
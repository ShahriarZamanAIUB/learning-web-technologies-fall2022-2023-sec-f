<?php 
    


    $typedText = $_POST['typedText'];
    
    if($typedText != null){
         
        $host = "localhost";
        $dbname= "web_tech_final_project";
        $dbpass = "";
        $dbuser = "root";
    
        
         $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
         


        $sql = "select * from allusers where username like '%{$typedText}%'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width=300px>";

            echo "<tr>";
            echo "<th>Username</th>";  
            echo "<th>Password</th>"; 
            echo "<th>Email</th>";   
            echo "<th>Address</th>";
            echo "<th>Balance</th>";
            echo "<th>Usertype</th>";    
             
            echo "</tr>";

            
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>".$row["username"]."</td>";  
                echo "<td align='center'>".$row["password"]."</td>"; 
                echo "<td align='center'>".$row["email"]."</td>";   
                echo "<td align='center'>".$row["address"]."</td>";
                echo "<td align='center'>".$row["balance"]."</td>";
                echo "<td align='center'>".$row["usertype"]."</td>";    
                 
                echo "</tr>";

                
              
            }

            echo "</table>";
             
            //return true;
        } 

        else{
            echo "No results found";
        }
        
        


    }else{
        echo "Null value..";
    }

?>
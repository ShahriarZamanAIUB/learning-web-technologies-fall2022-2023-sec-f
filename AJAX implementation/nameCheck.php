<?php 
    


    $typedText = $_POST['typedText'];
    //sleep(4);
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
            echo "<table border='1'>";

            echo "<tr>";
            echo "<th> username </th>";  
            echo "<th> password </th>"; 
            echo "<th> email </th>";   
            echo "<th> address </th>";
            echo "<th> balance </th>";
            echo "<th> usertype </th>";    
             
            echo "</tr>";


            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row["username"]."</td>";  
                echo "<td>".$row["password"]."</td>"; 
                echo "<td>".$row["email"]."</td>";   
                echo "<td>".$row["address"]."</td>";
                echo "<td> Tk. ".$row["balance"]."</td>";
                echo "<td>".$row["usertype"]."</td>";    
                 
                echo "</tr>";

                 
              
            }

            echo "</table>";
             
            //return true;
        } 
        
        else{
            echo "No results Found!";
        }


    }else{
        echo "Null value..";
    }

?>
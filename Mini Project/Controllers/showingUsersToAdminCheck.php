<?php 

    require_once "../Models/db.php";
    require_once "../Models/userModel.php";

       
  
        
        $con = getConnection();
         


        $sql = "select * from users";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1'  cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>ID</th>";  
            echo "<th>Name</th>"; 
            echo "<th>Email</th>";
            echo "<th>User Type</th>";  
            
             
            echo "</tr>";

             

            
            while($row = mysqli_fetch_array($result)) {
                                
                echo "<td align='center' > ".$row['id']." </td>";  
                echo "<td align='center' > ".$row['username']." </td>"; 
                echo "<td align='center' > ".$row['email']." </td>"; 
                echo "<td align='center' > ".$row['usertype']." </td>"; 
               
                echo "</tr>";

                 
              
            }

            echo "</table>";
             
            //return true;
        } 

        else{
            echo "No results found";
        }
   

?>
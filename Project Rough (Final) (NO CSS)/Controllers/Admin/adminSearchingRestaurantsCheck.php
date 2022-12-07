<?php 
    require_once "../../Models/userModel.php";
    require_once "../../Models/restaurantModel.php";


    $typedText = $_POST['typedText'];
    
    if($typedText != null){
         
     /*   $host = "localhost";
        $dbname= "web_tech_final_project";
        $dbpass = "";
        $dbuser = "root"; */
    
        
         $con = getConnection();
         


        $sql = "select * from allrestaurants where name like '%{$typedText}%'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Name</th>";  
            echo "<th>Restaurant ID</th>"; 
            echo "<th>Address</th>";
            echo "<th>Owner ID</th>";  
            
            echo "<th>Balance</th>";
            echo "<th>Review</th>";    
             
            echo "</tr>";

            $rowcount=0;

            
            while($row = mysqli_fetch_array($result)) {
                if($rowcount%2==0)
               { echo "<tr bgcolor='lightblue'>";}

           else{
            echo "<tr bgcolor='white'>";
               }                
                echo "<td align='center' >".$row["name"]."</td>";  
                echo "<td align='center'>".$row["id"]."</td>"; 
                echo "<td align='center'>".$row["address"]."</td>";
                echo "<td align='center'>".$row["ownerid"]."</td>";    
                echo "<td align='center'>".$row["balance"]."</td>";
                echo "<td align='center'>".$row["review"]."</td>";
   
                 
                echo "</tr>";

                $rowcount++;
              
            }

            echo "</table>";
             
            //return true;
        } 

        else{
            echo "No results found";
        }
        
        


    }else{
        
        $con = getConnection();
         


        $sql = "select * from allrestaurants ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Name</th>";  
            echo "<th>Restaurant ID</th>"; 
            echo "<th>Address</th>";
            echo "<th>Owner ID</th>";  
            
            echo "<th>Balance</th>";
            echo "<th>Review</th>";    
             
            echo "</tr>";

            $rowcount=0;

            
            while($row = mysqli_fetch_array($result)) {
                if($rowcount%2==0)
               { echo "<tr bgcolor='lightblue'>";}

           else{
            echo "<tr bgcolor='white'>";
               }                
               echo "<td align='center' >".$row["name"]."</td>";  
                echo "<td align='center'>".$row["id"]."</td>"; 
                echo "<td align='center'>".$row["address"]."</td>";
                echo "<td align='center'>".$row["ownerid"]."</td>";    
                echo "<td align='center'>".$row["balance"]."</td>";
                echo "<td align='center'>".$row["review"]."</td>";
   
                 
                echo "</tr>";

                $rowcount++;
              
            }

            echo "</table>";
             
            //return true;
        } 

        else{
            echo "No results found";
        }
    }

?>
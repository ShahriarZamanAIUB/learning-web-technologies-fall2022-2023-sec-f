<?php 
    require_once "../../Models/userModel.php";


    $typedText = $_POST['typedText'];
    
    if($typedText != null){
         
     /*   $host = "localhost";
        $dbname= "web_tech_final_project";
        $dbpass = "";
        $dbuser = "root"; */
    
        
         $con = getConnection();
         


        $sql = "select * from allusers where username like '%{$typedText}%'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Username</th>";  
            echo "<th>Password</th>"; 
            echo "<th>Email</th>";
            echo "<th>User ID</th>";  
            echo "<th>Address</th>";
            echo "<th>Balance</th>";
            echo "<th>Usertype</th>";    
             
            echo "</tr>";

            $rowcount=0;

            
            while($row = mysqli_fetch_array($result)) {
                if($rowcount%2==0)
               { echo "<tr bgcolor='lightblue'>";}

           else{
            echo "<tr bgcolor='white'>";
               }                
                echo "<td align='center' > <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["username"]."</a></td>";  
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["password"]."</a></td>"; 
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["email"]."</a></td>";
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["userid"]."</a></td>";    
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["address"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'> Tk. ".$row["balance"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["usertype"]."</a></td>";    
                 
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
         


        $sql = "select * from allusers ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0){
            echo "<table border='1' width='1000px' cellspacing='3'  cellpadding='3'>";

            echo "<tr>";
            echo "<th>Username</th>";  
            echo "<th>Password</th>"; 
            echo "<th>Email</th>";
            echo "<th>User ID</th>";  
            echo "<th>Address</th>";
            echo "<th>Balance</th>";
            echo "<th>Usertype</th>";    
             
            echo "</tr>";

            $rowcount=0;

            
            while($row = mysqli_fetch_array($result)) {
                if($rowcount%2==0)
               { echo "<tr bgcolor='lightblue'>";}

           else{
            echo "<tr bgcolor='white'>";
               }                
                echo "<td align='center' > <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["username"]."</a></td>";  
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["password"]."</a></td>"; 
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["email"]."</a></td>";
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["userid"]."</a></td>";    
                echo "<td align='center'> <a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["address"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'> Tk. ".$row["balance"]."</a></td>";
                echo "<td align='center'><a href=../../Views/Admin/adminEditingUsers.php?id=".$row["userid"]." style='text-decoration: none'>".$row["usertype"]."</a></td>";    
                 
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
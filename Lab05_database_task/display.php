<?php

echo "<title>Display</title>";

echo "<fieldset><legend>Display</legend>";


$con = mysqli_connect('localhost', 'root', '', 'product_db');

$sql = "select name, selling_price-buying_price profit from products where display='yes'";
    $result = mysqli_query($con, $sql);

 

    echo "<table border=1>
    <tr>
        <th>NAME</th>
        <th>PROFIT</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>";

while($data  = mysqli_fetch_assoc($result)){
echo    "<tr>
            <td>{$data['name']}</td>        
            <td>{$data['profit']}</td>        
            <td><a href='edit.php' name='product_name' value={$data['name']}>edit</a></td>    
            <td><a href='delete.php' name='productName' value={$data['name']}>delete</a></td>        
        </tr>";
}

echo "</table>";

echo "</fieldset>";
?>
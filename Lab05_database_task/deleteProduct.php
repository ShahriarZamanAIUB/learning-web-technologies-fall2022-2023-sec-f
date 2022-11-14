<?php 

session_start();

	if (isset($_GET['delete'])) 
    {
		$product_name = $_GET['delete'];

        setcookie('row_name',$product_name,time()+60*60,'/');
		 
		  
	}


    $con = mysqli_connect('localhost', 'root', '', 'product_db');
    $sql = "select * from products where name='{$product_name}'";
    $result = mysqli_query($con, $sql);

    $data  = mysqli_fetch_assoc($result);

    if (!isset($data)){ header('location: display.php?err=null_values');}
?>


<html>
<head>
    <title>Delete Product</title>

    <body>
    <a href="home.php">Home</a>&nbsp <a href="addProduct.php">Add Products </a> &nbsp <a href="display.php">Display Products </a>
    <br><br>
    <fieldset>
    <legend>DELETE PRODUCT</legend>
         <table>
             
            <form method="post" action="deleteProductCheck.php" enctype=""> 
                
                <table>
                <tr><td>Name: <?php echo $data['name']; ?></td></tr>
                    <tr><td>Buying Price: <?php echo $data['buying_price']; ?></td></tr>
                    <tr><td>Selling Price: <?php echo $data['selling_price']; ?></td></tr>
                    <tr><td>Displayable: <?php echo $data['display']; ?></td></tr>
                    
                   
                    <tr><td><hr></td></tr>
                    <tr><td><input type="submit" value="Delete" ></input> </td></tr>


</form>
</table>
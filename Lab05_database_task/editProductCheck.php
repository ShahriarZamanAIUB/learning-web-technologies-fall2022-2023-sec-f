<?php

$name= $_POST["name"];
$buying_price= $_POST["buyingPrice"];
$selling_price= $_POST["sellingPrice"];
$display=$_POST["display"];
$row_name;

if(isset($_COOKIE['row_name'])){
$row_name=$_COOKIE['row_name'];
}

if($name=="" || $buying_price =="" || $selling_price==""  )
{

    header('location: editProduct.php?err=null');

}

else{  if($display!="yes"){$display="no";}



    $con = mysqli_connect('localhost', 'root', '', 'product_db');
        $sql = "update products set name='{$name}', buying_price='{$buying_price}', selling_price='{$selling_price}', display='{$display}' where name='{$row_name}'";
        $status = mysqli_query($con, $sql);
        
        if($status){
            header('location: display.php?message=update_successful');

            setcookie('row_name',$row_name,time()-60,'/');
        }else{
           echo "Update Failed!";

           setcookie('row_name',$row_name,time()-60,'/');

           header('location: display.php?err=update_failed');
        }
}
 




?>
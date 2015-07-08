<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT product_id, p.name as product, c.name as category, p.category as category_id, p.description  FROM avon.product p, avon.product_category c WHERE p.is_archived=0 and p.category = c.product_category_id";
    $result = mysqli_query($con,$sql);
    include 'productTable.php';
    mysqli_close($con);
?>


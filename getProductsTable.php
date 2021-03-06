<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT product_id, p.name as product, if (p.catalogue_code is null, -1, p.catalogue_code) as catalogue_code, concat(p.unit_amount, ' ', u.shortened_name) as unit_amount, u.unit_id as unit_id, p.unit_amount as amount, c.name as category, p.category as category_id, p.description ".
            "FROM avon.product p, avon.product_category c , avon.unit u ".
            "WHERE p.is_archived=0 and p.category = c.product_category_id AND p.unit_id=u.unit_id";
    $result = mysqli_query($con,$sql);
    include 'productTable.php';
    mysqli_close($con);
?>


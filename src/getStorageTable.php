<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT    s.item_id, 
                    p.name as product_name, 
                    p.description  as product_description,
                    c.name as category, 
                    s.produced_date,
                    s.preservation, 
                    s.buying_price,
                    s.selling_price, 
                    s.amount
            FROM avon.storage s, avon.product p, avon.product_category c 
            WHERE s.product_id=p.product_id AND p.is_archived=0 AND p.category = c.product_category_id";
    $result = mysqli_query($con,$sql);
    include 'storageTable.php';
    mysqli_close($con);
?>

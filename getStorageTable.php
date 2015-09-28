<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT    s.item_id, 
                    p.name as product_name, 
                    concat(p.unit_amount, ' ', u.shortened_name) as product_unit,
                    p.description  as product_description,
                    c.name as category, 
                    s.produced_date,
                    s.preservation, 
                    s.buying_price,
                    s.selling_price, 
                    s.amount,
                    concat(cam.year, '_', cam.campaign_number) as campaign,                    
                    s.location
            FROM avon.storage s, avon.product p, avon.product_category c, avon.campaign cam, avon.unit u
            WHERE s.product_id=p.product_id AND p.is_archived=0 AND p.category = c.product_category_id
                AND s.campaign_id=cam.campaign_id AND p.unit_id=u.unit_id";
    $result = mysqli_query($con,$sql);
    include 'storageTable.php';
    mysqli_close($con);
?>

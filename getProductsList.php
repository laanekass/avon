<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT product_id as id, CONCAT(UPPER(c.name) , ' - ', p.name, '(', p.description, ')')  as text 
            FROM avon.product p, avon.product_category c 
            WHERE p.is_archived=0 AND p.category=c.product_category_id 
            ORDER BY c.name, p.name";
    $result = mysqli_query($con,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($con);
?>


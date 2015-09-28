<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT * FROM avon.product_category WHERE is_archived=0";
    $result = mysqli_query($con,$sql);
    include 'productCategoryTable.php';
    mysqli_close($con);
?>

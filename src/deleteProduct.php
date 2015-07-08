<?php
    $productId = $_POST["productID"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.product SET is_archived = 1 WHERE product_id = ".$productId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>
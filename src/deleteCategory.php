<?php
    $categoryId = $_POST["categoryID"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.product_category SET is_archived = 1 WHERE product_category_id = ".$categoryId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>
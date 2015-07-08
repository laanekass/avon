<?php
    $categoryName = $_POST["categoryName"];
    $categoryDescription = $_POST["categoryDescription"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.product_category (name, description) VALUES ('".$categoryName."', '".$categoryDescription."')";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>


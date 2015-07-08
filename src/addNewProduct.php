<?php
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $categoryID = $_POST["categoryId"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.product(name, description, category ) VALUES ('".$productName."', '".$productDescription."', ".$categoryID.")";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>


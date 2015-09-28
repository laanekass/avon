<?php
    $categoryId = $_POST["modifyCategoryID"];
    $categoryName = $_POST["modifyCategoryName"];
    $categoryDescription = $_POST["modifyCategoryDescription"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.product_category SET name = '".$categoryName."', description = '".$categoryDescription."' WHERE product_category_id = ".$categoryId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

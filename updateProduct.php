<?php
    $productId = $_POST["modifyProductID"];
    $productName = $_POST["modifyProductName"];
    $productDescription = $_POST["modifyProductDescription"];
    $productAmount = $_POST["modifyProductUnitAmount"];
    $categoryId = $_POST["categoryId"];
    $unitId = $_POST["unitId"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.product SET name = '".$productName."', description = '".$productDescription."', category=".$categoryId.", unit_amount=".$productAmount.", unit_id=".$unitId." WHERE product_id = ".$productId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

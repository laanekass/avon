<?php
    $productName = $_POST["productName"];
    $productCatalogueCode = $_POST["productCatalogueCode"];
    $productDescription = $_POST["productDescription"];
    $categoryID = $_POST["categoryId"];
    $productUnitAmount = $_POST["productUnitAmount"];
    $unitID=$_POST["unitId"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.product(name, catalogue_code, description, category, unit_amount, unit_id) VALUES ('".$productName."', ".$productCatalogueCode.", '".$productDescription."', ".$categoryID.", ".$productUnitAmount.", ".$unitID.")";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>


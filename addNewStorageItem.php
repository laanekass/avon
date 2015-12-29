<?php
    $productId = $_POST["productId"];
    $productProducedDate = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["productProducedDate"])));
    $location = $_POST["location"];
    $buyingPrice = $_POST["buyingPrice"];
    $sellingPrice = $_POST["sellingPrice"];
    $amount = $_POST["amount"];
    $campaignId = $_POST["campaignId"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }
    echo $buyingPrice;
    $sql="INSERT INTO avon.storage(product_id, produced_date, location, buying_price, selling_price,amount, campaign_id ) ".
            "VALUES (".$productId.", '".$productProducedDate."', '".$location."', ".$buyingPrice.", ".
            $sellingPrice.", ".$amount.", ".$campaignId.")";
    echo $sql;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>


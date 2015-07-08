<?php
    $productId = $_POST["productId"];
    $productProducedDate = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["productProducedDate"])));
    $preservationTime = $_POST["preservationTime"];
    $buyingPrice = $_POST["buyingPrice"];
    $sellingPrice = $_POST["sellingPrice"];
    $amount = $_POST["amount"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.storage(product_id, produced_date, preservation, buying_price, selling_price,amount ) 
            VALUES (".$productId.", '".$productProducedDate."', ".$preservationTime.", ".$buyingPrice.", ".$sellingPrice.", ".$amount.")";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>


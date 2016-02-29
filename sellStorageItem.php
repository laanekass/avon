<?php
    $storageItemId = $_POST['sellStorageItemID'];
    $productId = $_POST['sellProductID'];
    $storageAmount = $_POST['storageAmount'];
    $amountSold = $_POST['sellingProductAmount'];
    $newStorageAmount =  $storageAmount-$amountSold;
    $saleDate = $_POST['sellStorageProducedDateSelect'];    
    $sellingPrice = $_POST['sellStorageProductSellingPrice'];
    $buyingPrice = $_POST['sellStorageProductBuyingPrice'];
    $profit = $amountSold * ($sellingPrice-$buyingPrice);
    $clientId = $_POST['clientId'];

    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.client_product (client_id, product_id, sale_date, amount, selling_price, profit) VALUES (".$clientId.", ".$productId.", '".$saleDate."', ".$amountSold.", ".$sellingPrice.", ".$profit.")";
    echo $sql;
    $result = mysqli_query($con,$sql);
    $sql ="UPDATE avon.storage SET amount= ".$newStorageAmount." WHERE item_id = ".$storageItemId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

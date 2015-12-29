<?php
    $storage_item_id = $_POST["modifyStorageItemID"];
    $produced_date = $_POST["modifyStorageProducedDateSelect"];
    $buying_price = $_POST["modifyStorageProductBuyingPrice"];
    $selling_price = $_POST["modifyStorageProductSellingPrice"];
    $amount = $_POST["modifyProductAmountInStorage"];
    $location = $_POST["modifyStorageProductLocation"];
    $campaignId = $_POST["campaignId"];

    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }    
    $sql="UPDATE avon.storage SET produced_date = '".$produced_date."', buying_price = ".$buying_price.", selling_price = ".$selling_price.", amount = ".$amount.", location = '".$location."', campaign_id=".$campaignId." WHERE item_id = ".$storage_item_id;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

 
<?php
    include 'dbConnection.php';
    $clientId = $_POST['clientID'];

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql = "SELECT concat(c.first_name, ' ' ,c.last_name) as client_name FROM avon.client c WHERE c.client_id =".$clientId;
    $client = mysqli_query($con,$sql);

    $sql="SELECT p.name as product_name, pc.sale_date, pc.amount, pc.selling_price, pc.profit".
            " FROM  avon.product p, avon.client_product pc ".
            " WHERE  pc.product_id = p.product_id and pc.client_id =".$clientId." ORDER BY pc.sale_date desc;";
    $result = mysqli_query($con,$sql);

    $sql="SELECT sum(pc.selling_price) as totalSum, sum(pc.profit) as totalProfit".
            " FROM  avon.client_product pc ".
            " WHERE  pc.client_id =".$clientId;
    $totals = mysqli_query($con,$sql);

    include 'clientSalesTable.php';
    mysqli_close($con);
?>

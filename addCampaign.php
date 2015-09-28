<?php
    $campaignYear = $_POST["campaignYear"];
    $campaignNo = $_POST["campaignNumber"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.campaign (year, campaign_number) VALUES ('".$campaignYear."', '".$campaignNo."');";
    echo $sql;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>
<?php
    include 'dbConnection.php';
    $clientId = $_POST['clientID'];

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql = "SELECT c.client_id, concat(c.first_name, ' ' ,c.last_name) as client_name FROM avon.client c WHERE c.client_id =".$clientId;
    $client = mysqli_query($con,$sql);

    include 'clientReservedProductsTable.php';
    mysqli_close($con);
?>

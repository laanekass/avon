<?php
    $clientId = $_POST["clientID"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.client SET is_archived = 1 WHERE client_id = ".$clientId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

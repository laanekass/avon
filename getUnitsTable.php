<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT * FROM avon.unit";
    $result = mysqli_query($con,$sql);
    include 'productUnitTable.php';
    mysqli_close($con);
?>
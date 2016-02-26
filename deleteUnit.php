<?php
    $unitId = $_POST["unitID"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.unit SET is_archived = 1 WHERE unit_id = ".$unitId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>
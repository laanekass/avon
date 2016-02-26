<?php
    $unitId = $_POST["modifyUnitID"];
    $unitName = $_POST["modifyUnitName"];
    $unitShortenedName = $_POST["modifyUnitShortenedName"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.unit SET name = '".$unitName."', shortened_name = '".$unitShortenedName."' WHERE unit_id = ".$unitId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>
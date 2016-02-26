<?php
    $unitName = $_POST["unitName"];
    $unitShortenedName = $_POST["unitShortenedName"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.unit (name, shortened_name) VALUES ('".$unitName."', '".$unitShortenedName."')";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

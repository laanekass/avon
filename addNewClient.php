<?php
    $clientFirstName = $_POST["clientFirstName"];
    $clientLastName = $_POST["clientLastName"];
    $clientBirthday = $_POST["clientBirthday"];
    $clientPhone = $_POST["clientPhone"];
    $clientEmail = $_POST["clientEmail"];
    $clientAddress=$_POST["clientAddress"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="INSERT INTO avon.client(first_name, last_name, birthday, phone, email, address) VALUES ('".$clientFirstName."', '".$clientLastName."', '".$clientBirthday."', ".$clientPhone.", '".$clientEmail."', '".$clientAddress."');";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

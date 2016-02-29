<?php
    $clientId = $_POST["modifyClientID"];
    $firstName = $_POST["modifyClientFirstName"];
    $lastName = $_POST["modifyClientLastName"];
    $birthday = $_POST["modifyClientBirthday"];
    $phone = $_POST["modifyClientPhone"];
    $email = $_POST["modifyClientEmail"];
    $address = $_POST["modifyClientAddress"];
    include 'dbConnection.php';
    $con = mysqli_connect($servername, $username, $password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="UPDATE avon.client SET first_name = '".$firstName."', last_name = '".$lastName."', birthday = '".$birthday."', phone=".$phone.", email='".$email."', address='".$address."' WHERE client_id = ".$clientId;
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
?>

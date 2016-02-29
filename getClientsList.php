<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT client_id as id, concat(last_name, ', ', first_name) as text FROM avon.client WHERE is_archived=0 ".
            "ORDER BY last_name asc, first_name asc;";
    $result = mysqli_query($con,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($con);
?>
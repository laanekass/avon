<?php
    include 'dbConnection.php';

    $con = mysqli_connect($servername, $username,$password ,$dbname);  
    if (!$con) {
        die('Could not connect: ' .mysqli_error($con));
    }

    $sql="SELECT campaign_id as id, concat(year, '_', campaign_number) as text FROM avon.campaign 
            ORDER BY year desc, campaign_number desc;";
    $result = mysqli_query($con,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($con);
?>


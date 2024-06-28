<?php 

    include "conn.php";

    $mac_address = $_GET['mac'];
    $location    = $_GET['loc'];
    $status      = $_GET['status'];


    $sql_insert = "INSERT INTO history (mac_address, location, status) VALUES ('$mac_address', '$location', '$status')";

  

    if($conn->query($sql_insert)){
        echo "Save Success";
    }
    else{ echo "failed !";}


    
?>
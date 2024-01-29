<?php

    $dbServerName = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "noodlebeat";

    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    if(mysqli_connect_errno()){
        echo "Failed to connect";
    }

?>
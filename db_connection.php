<?php
    session_start();
    $con = mysqli_connect("198.91.81.2", "aarontum_admin1", "password", "aarontum_Forum");

    if (mysqli_connect_errno()){
        echo "Failed to connect to database: " . mysqli_connect_errno();
        exit;
    }
?>
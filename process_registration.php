<?php

    include 'db_connection.php';

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $password = sha1(mysqli_real_escape_string($con, $_POST['password']));

    $sql = "Insert into tbl_Users (Username, Name, Age, Password) Values ('$username', '$name', '$age', '$password')";

    mysqli_query($con, $sql);

    header("Location: info_page.php?info=Account%20Created");

?>
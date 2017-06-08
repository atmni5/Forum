<?php

    include 'db_connection.php';

    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $password = htmlspecialchars($_POST['password']);
    $password = sha1($password);

    $sql = "Insert into tbl_Users (Username, Name, Age, Password) Values ('$username', '$name', '$age', '$password')";

    mysqli_query($con, $sql);

    header("Location: info_page.php?info=Account%20Created");

?>
<?php

    session_start();

    include('db_connection.php');

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = $_POST['age'];
    if ($age != 0){
        $age = '\''.$_POST['age'].'\'';   
    } else {
        $age = "NULL";
    }
    $password = $_POST['password'])
    $sql;

    if ($password != ""){
        $password = sha1(mysqli_real_escape_string($con, $password);
        $sql = "Update tbl_Users set Name = '$name', Age = $age, Password = '$password' where U_ID = '". $_SESSION['U_ID'] ."'";
    } else {
        $sql = "Update tbl_Users set Name = '$name', Age = $age where U_ID = '". $_SESSION['U_ID'] ."'";
    }

    $result = mysqli_query($con, $sql);

    header('Location: profile.php');

?>
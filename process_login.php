<?php

    include('db_connection.php');
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = sha1(mysqli_real_escape_string($con, $_POST['password']));
    $sql = "Select * from tbl_Users where Username = '$username' && Password = '$password'";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $_SESSION["Username"] = $row['Username'];
            $_SESSION["U_ID"] = $row['U_ID'];
            $_SESSION["Level"] = $row['Level'];
        }     
    }
    else{
        echo 'account not found';
        die();
    }

    header('Location: index.php');

?>
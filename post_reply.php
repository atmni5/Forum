<?php
    
    session_start();

    if (!isset($_SESSION['U_ID'])){
        header('Location: index.php');
    }

    $message = mysqli_real_escape_string($con, $_POST['message']);
    $threadID = $_POST['threadID'];

    include 'db_connection.php';

    $sql = "insert into tbl_Thread_Posts (Poster_ID, Message, Thread_ID) Values ('" . $_SESSION['U_ID'] . "', '$message', '$threadID')";

    $result = mysqli_query($con, $sql);

    header('Location: thread_posts.php?threadID='.$threadID.'');

?>
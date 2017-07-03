<?php

    include 'db_connection.php';

    $threadID = $_POST['threadID'];
    $name = $_POST['userName'];

    if($_SESSION['Username'] == $name || $_SESSION["Level"] > 1){
        
        $sql = "DELETE FROM tbl_Thread_Posts WHERE U_ID = $threadID";
        header("Location: thread_posts.php?threadID=". $threadID);
    }

?>
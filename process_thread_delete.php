<?php

    include 'db_connection.php';

    $threadID = $_POST['threadID'];
	$postID = $_POST['postID'];
    $name = $_POST['userName'];

    if($_SESSION['Username'] == $name || $_SESSION["Level"] > 1){
        
        $sql = "DELETE FROM tbl_Thread_Posts WHERE U_ID = $postID";
		mysqli_query($con, $sql);
        header("Location: thread_posts.php?threadID=". $threadID);
    }

?>
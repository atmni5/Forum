<?php 
    include 'header.php';
?>    

<?php

    echo '<div id="reply_button">';
    if (isset($_SESSION['U_ID'])){
        echo '<a href="#post_reply"><img id="reply_button_image" src="http://aarontumini.x10host.com/forum/D:/Google%20Drive/Webhost/Forum/Images/Reply_Button.png" /></a>';
    } else {
        echo '<a href="registration.php"><img id="reply_button_image" src="http://aarontumini.x10host.com/forum/D:/Google%20Drive/Webhost/Forum/Images/Reply_Button.png" /></a>';
    }
    echo '</div>';

    include('db_connection.php');

    $threadID = $_GET['threadID'];

    $sql = "SELECT tbl_Thread_Posts.*, tbl_Thread_Posts.U_ID AS postID, tbl_Users.* FROM tbl_Thread_Posts INNER JOIN tbl_Users ON tbl_Thread_Posts.Poster_ID = tbl_Users.U_ID Where Thread_ID = $threadID";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
        
        while ($rows = mysqli_fetch_assoc($result)){
            echo '<div class="thread_post">';
            echo '<div class="thread_post_left_col">';
            echo $rows['Name'] . '<br />';
            if ($rows['Age'] != NULL){
                echo $rows['Age'] . '<br />';
            }
            if ($rows['Level'] == 3){
                echo 'Admin<br />';
            } else if ($rows['Level'] == 2){
                echo 'Moderator<br />';
            }
            else {
                echo 'Pleb<br />';
            }
            echo '</div>';
            echo '<div class="thread_post_right_col">';
            echo $rows['Message'] . '<br />';
            echo '<div class="thread_tools">';
            if ($_SESSION["Username"] == $rows["Name"] || $_SESSION["Level"] > 1){
                echo '<form action="process_thread_delete.php" method="post">';
                echo '<input type="hidden" value="' . $threadID . '" name="threadID"/>';
				echo '<input type="hidden" value="' . $rows['postID'] . '" name="postID"/>';
                echo '<input type="hidden" value="' . $rows['Name'] . '" name="userName"/>';
                echo '<input value="Delete" type="submit" class="thread_delete"/>';
                echo '</form>';
            }            
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
    }

    if (isset($_SESSION['U_ID'])){
        echo '<div id="post_reply">';
        echo '<form action="post_reply.php" method="post">';
        echo '<input type="hidden" name="threadID" value="' . $threadID . '" />';
        echo '<textarea name="message" placeholder="Post reply..."></textarea>';
        echo '<input id="reply_submit" type="submit" value="Post Reply" />';
        echo '</form>';
        echo '</div>';
    }
	
?>

<?php
    include 'footer.html';
?>
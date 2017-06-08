<?php
    include 'header.php';
?>

<?php

    include 'db_connection.php';

    $search = $_GET['search'];
    $forumid = $_GET['forum'];
    $type = $_GET['search_type'];

    if ($type == "post"){
        $sql = "Select tbl_Thread_Posts.Message, tbl_Thread_Posts.Thread_ID, tbl_Users.Name AS Users_Name from tbl_Thread_Posts INNER JOIN tbl_Users ON tbl_Thread_Posts.Poster_ID = tbl_Users.U_ID Where tbl_Thread_Posts.Message like '%$search%'";
        
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo $row['Message'];
        }
        
    } else {
        $sql = "SELECT tbl_Threads.Name, tbl_Threads.Timestamp, Count(tbl_Thread_Posts.Thread_ID) as Replys, tbl_Threads.U_ID, tbl_Users.Name AS Users_Name 
        FROM tbl_Threads 
        INNER JOIN tbl_Users ON tbl_Threads.User_ID = tbl_Users.U_ID 
        INNER JOIN tbl_Thread_Posts ON tbl_Threads.U_ID = tbl_Thread_Posts.Thread_ID
        WHERE tbl_Threads.Name LIKE '%$search%'
        GROUP BY tbl_Threads.U_ID
        ORDER BY tbl_Threads.Timestamp";
        
        $result = mysqli_query($con, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="forum_threads">';
            echo '<table>';
            echo '<tr>';
            echo '<td width="750">';
            echo '<h3 style="font-weight:bold;"><a href="thread_posts.php?threadID=' . $row['U_ID'] . '">';
            echo $row['Name'];
            echo '</a></h3>';
            echo '</td>';
            echo '<td class="thread_replys" rowspan="2">';
            $replys = $row['Replys'] - 1;
            echo 'Replys: '. $replys .'<br/>';
            echo 'Created on '. $row['Timestamp'];
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo '<div class="forum_threads_subtext">Post Created by <div class="bold">'. $row['Users_Name'] .'.</div></div>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
        }
        
    }

    //$sql = "SELECT tbl_Thread_Posts.*, tbl_Users.* FROM tbl_Thread_Posts INNER JOIN tbl_Users ON tbl_Thread_Posts.Poster_ID = tbl_Users.U_ID Where Thread_ID = $threadID";

?>

<?php
    include 'footer.php';
?>
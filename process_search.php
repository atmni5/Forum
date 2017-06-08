<?php
    include 'header.php';
?>

<?php

	echo '<form id="search_bar" action="process_search.php" method="get">';
	echo 'Search: <input type="text" name="search" />';
	echo '</form>';

    include 'db_connection.php';

    $search = $_GET['search'];

//    $sql = "Select * from tbl_Threads Where Name like '%$search%'";
//    $result = mysqli_query($con, $sql);
//
//    while($row = mysqli_fetch_assoc($result)){
//
//        echo '<div class="forum_threads"><h3 style="font-weight:bold;"><a href="thread_posts.php?threadID=' . $row['U_ID'] . '">';
//        echo $row['Name'];
//        echo '</a></h3></div>';
//
//    }

        $sql = "SELECT tbl_Threads.Name, tbl_Threads.Timestamp, Count(tbl_Thread_Posts.Thread_ID) as Replys, tbl_Threads.U_ID, tbl_Users.Name AS Users_Name 
        FROM tbl_Threads 
        INNER JOIN tbl_Users ON tbl_Threads.User_ID = tbl_Users.U_ID 
        INNER JOIN tbl_Thread_Posts ON tbl_Threads.U_ID = tbl_Thread_Posts.Thread_ID
        WHERE tbl_Threads.Name LIKE '%$search%'
        GROUP BY tbl_Threads.U_ID
        ORDER BY tbl_Threads.Timestamp";
        
        $result = mysqli_query($con, $sql);
        
        echo '<div>';
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
        echo '</div>';

?>

<?php
    include 'footer.php';
?>

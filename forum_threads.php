<?php 
    include 'header.php';
?>

<?php
    
    if (!isset($_GET["forumgroup"]) && !isset($_GET["forum"]) && !isset($_GET['forumID'])){
        echo "No forum found!";
    }

    $forumgroup = $_GET["forumgroup"];
    $forum = $_GET["forum"];
    $forumID = $_GET["forumID"];

    include('db_connection.php');
    
    $sql = "Select * from tbl_Threads Where Forum_ID = " . $forumID . " order by Timestamp ASC";
    $result = mysqli_query ($con, $sql);

    while ($row = mysqli_fetch_assoc($result)){
        
        echo '<div class="forum_threads"><h3 style="font-weight:bold;"><a href="thread_posts.php?threadID=' . $row['U_ID'] . '">';
        echo $row['Name'];
        echo '</a></h3></div>';
        
    }

?>

<?php
    include 'footer.html';
?>
<?php 
    include 'header.html';
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
        
        echo '<div class="forum_threads">';
        echo $row['Name'];
        echo '</div>';
        
    }

?>

<?php
    include 'footer.html';
?>
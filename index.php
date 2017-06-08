<?php
    include 'header.php';
?>


<?php

    include('db_connection.php');
    
    $sql = "Select * from tbl_Forum_Group";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="forum_group">';
            echo '<div class="forum_group_title"><h1>' . $row['Name'] . '</h1></div>';
            
            $sql2 = "Select * from tbl_Forum where Forum_Group_ID = " . $row['U_ID'] . "";
            $result2 = mysqli_query($con, $sql2);
            
            if (mysqli_num_rows($result2) > 0){
                
                while ($row2 = mysqli_fetch_assoc($result2)){
                    echo '<div class="forum">';
                    echo '<h2><a href="forum_threads.php?forumID=' . $row2['U_ID'] .'">' . $row2['Name'] . '</a></h2><br/>';
                    echo '<h3>' . $row2['Description'] . '</h3>';
                    echo '</div>';
                }
                    
            }
            
            echo '<div class="forum_group_thread"></div>';
            echo '</div>';
        }
        
    }
    else {
        echo "0 results";
    }

?>


<?php
    include 'footer.php';
?>
<?php
	include 'header.php';
?>

<?php

	include 'db_connection.php';

	$sql = "Select * from tbl_Forum_Group";
	$result = mysqli_query($con, $sql);
    echo '<form id="search_form" action="process_search_forum.php" method="get">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<td colspan="3">';
    echo '<h1>Search forum</h1>';
    echo '</td>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    echo '<tr>';
    echo '<td>';
    echo 'Keyword(s):';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" style="width:200px;" name="search"/>';
    echo '</td>';
    echo '<td>';
    echo '<select name="search_type">';
    echo '<option value="post">Search posts</option>';
    echo '<option value="thread">Search threads</option>';
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td style="width:300px;">';
    echo 'Search in forum(s):';
    echo '</td>';
    echo '<td>';
    echo '<select class="search_list" name="forum" size="6">';
	echo '<option selected="selected" value="all">Search all forums</option>';
	while ($row = mysqli_fetch_assoc($result)){
		echo '<option value="'.$row['U_ID'].'">'.$row['Name'].'</option>';
	}
	echo '</select>';
    echo '</td>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="3">';
    echo '<input type="submit" value="Search"/><input type="reset" value="Reset"/>';
    echo '</td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';

?>

<?php
	include 'footer.php';
?>

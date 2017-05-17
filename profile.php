<?php
    include 'header.php';
?>

<script>
    
    var state = false;

    function passwordCheck(){
        
        var form = document.getElementById("edit_details_form");
        var password1 = document.getElementsByName("password")[0].value;
        var password2 = document.getElementsByName("password2")[0].value;
        
        if (password1 == password2){
            form.submit();
            
        } else {
            alert("The entered passwords do not match!");
        }
        
    }
    
    function editProfile(){
        
        if (state == false){
        
            var name = document.getElementById("edit_name").innerHTML;
            document.getElementById("edit_name").style.display = 'none';
            document.getElementById("edit_name_input").style.display = "initial";

            var name = document.getElementById("edit_age").innerHTML;
            document.getElementById("edit_age").style.display = 'none';
            document.getElementById("edit_age_input").style.display = "initial";
            
            document.getElementsByClassName("edit_password")[0].style.visibility = 'initial';
            document.getElementsByClassName("edit_password")[1].style.visibility = 'initial';
            
            document.getElementById("submit_details").style.visibility = 'visible';
            
            state = true;
        
        }
    
    }

</script>

<?php

    include 'db_connection.php';

    $sql = "select * from tbl_Users where U_ID = '" . $_SESSION['U_ID'] . "'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_assoc($result);
        echo '<table id="edit_details">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>';
        echo '</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';        
        echo '<form id="edit_details_form" action="edit_details.php" method="post">';
        echo '<tr>';
        echo '<td>';
        echo '<h2>Name:</h2>';
        echo '</td>';
        echo '<td>';
        echo '<div id="edit_name">'.$rows['Name'].'</div><input id="edit_name_input" type="text" value="'.$rows['Name'].'" name="name" style="display:none;" />';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>';
        echo '<h2>Age:</h2>';
        echo '</td>';
        echo '<td>';
        echo '<div id="edit_age">'.$rows['Age'].'</div><input id="edit_age_input" type="number" value="'.$rows['Age'].'" name="age" style="display:none;" />';
        echo '</td>';
        echo '</tr>';
        echo '<tr class="edit_password" style="visibility:hidden;">';
        echo '<td rowspan="2" style="padding-top:15px; vertical-align:top;" >';
        echo 'Change password:';
        echo '</td>';
        echo '<td>';
        echo '<input name="password" type="password" style="float:right;" />';
        echo '</td>';
        echo '</tr>';
        echo '<tr class="edit_password" style="visibility:hidden;">';
        echo '<td>';
        echo '<input name="password2" type="password" style="float:right;" />';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="2">';
        echo '<div style="margin:auto;"><input type="button" onclick="editProfile()" value="Edit Profile" style="float:left; margin-right:180px; width:100px;"><input type="button" id="submit_details" style="visibility:hidden; float:left; width:80px;" value="Submit" onclick="passwordCheck()"/></div>';
        echo '</td>';
        echo '</tr>';
        echo '</form>';
        echo '</tbody>';
        echo '</table>';
    }

?>

<?php
    include 'footer.php';
?>
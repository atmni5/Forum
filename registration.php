<?php
    include 'header.php';
?>

<script>
    
    var state = false;

    function formCheck(){
        
        var form = document.getElementById("details_form");
        var password1 = document.getElementsByName("password")[0].value;
        var password2 = document.getElementsByName("password2")[0].value;
        var age = document.getElementById("details_age_input").value;
        
        if (password1 == password2 && password1 != ""){
            form.submit();
            
        } else if (password1 == ""){
            alert("Please enter a password");
        }else {
            alert("The entered passwords do not match!");
        }
        
    }

</script>

<?php

    echo '<table id="details">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>';
    echo '</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';        
    echo '<form id="details_form" action="process_registration.php" method="post">';
    echo '<tr>';
    echo '<td>';
    echo '<h2>Username:</h2>';
    echo '</td>';
    echo '<td>';
    echo '<input id="details_username_input" type="text" placeholder="Username" name="username" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<h2>Name:</h2>';
    echo '</td>';
    echo '<td>';
    echo '<input id="details_name_input" type="text" placeholder="Name" name="name" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>';
    echo '<h2>Age:</h2>';
    echo '</td>';
    echo '<td>';
    echo '<input id="details_age_input" type="number" placeholder="Age" name="age" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr class="edit_password">';
    echo '<td style="vertical-align:top;">';
    echo '<h2>Password:</h2>';
    echo '</td>';
    echo '<td>';
    echo '<input name="password" type="password" placeholder="Password" style="float:right;" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr class="create_password">';
    echo '<td>';
    echo '<h2>Re-enter password</h2>';
    echo '</td>';
    echo '<td>';
    echo '<input name="password2" type="password" placeholder="Password" style="float:right;" />';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="2"><br />';
    echo '<div style="margin:auto;"><input type="button" id="submit_details" style="float:right; width:130px;" value="Create account" onclick="formCheck()"/></div>';
    echo '</td>';
    echo '</tr>';
    echo '</form>';
    echo '</tbody>';
    echo '</table>';

?>

<?php
    include 'footer.php';
?>
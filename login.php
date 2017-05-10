<?php
    include 'header.php';
?>

<form action="process_login.php" method="post">
    Username:   <input type="text" name="username" /><br />
    Password:   <input type="password" name="password" /><br />
    <input type="submit" />
</form>

<?php
    include 'footer.php';
?>
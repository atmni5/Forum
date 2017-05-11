<?php session_start(); ?>
<!DOCTYPE html>
<html>
    
<head>
    
    <title>Forum</title>
    <link rel="icon" href="" />
    <link rel="stylesheet"  type="text/css" href="CSS/stylesheet.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</head>

<body>

    <header>
    
        <img src="http://aarontumini.x10host.com/forum/D:/Google%20Drive/Webhost/Forum/Images/Banner.png" width="960" />
    
        <nav>
        
            <div id="home"><a href="index.php">Home</a></div>
            <div id="profile"><a href="profile.php">Profile</a></div>
            <div id="search">Search</div>
            <div id="login"><?php if(isset($_SESSION['U_ID']))echo '<a href="process_logout.php">Logout</a>';else echo '<a href="login.php">Login</a>'; ?></div>
        </nav>
        
    </header>
    <div id="content">
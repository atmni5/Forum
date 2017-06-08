<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <title>Forum</title>
    <link rel="icon" href="" />
    <link rel="stylesheet"  type="text/css" href="stylesheet.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

    <header>

        <nav>

            <div id="home"><a href="index.php">Home</a></div>
            <?php if (isset($_SESSION['U_ID'])) echo '<div id="profile"><a href="profile.php">Profile</a></div>'; ?>
            <div id="search"><a href="search.php">Search</a></div>
            <div id="login"><?php if(isset($_SESSION['U_ID']))echo '<a href="process_logout.php">Logout</a>';else echo '<a href="login.php">Login</a>'; ?></div>
            <div id="registration"><?php if(!isset($_SESSION['U_ID']))echo '<a href="registration.php">Signup</a>'; ?></div>
        </nav>

    </header>
    <div id="content">

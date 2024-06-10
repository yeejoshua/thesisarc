<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php"><img src="logo.png" class="logo"></a>
        <ul>
            <input type="text" placeholder="Search..">
            <li><a href="index.php">Home</a></li>
            <li><a href="scan.php">Scan</a></li>
            <li><a href="location.php">Locations</a></li>
            <li><a href="programs.php">Programs</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
</div>

</body>
</html>
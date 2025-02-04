<?php
session_start();
include("connect.php");

// Redirect to login page if accessed directly
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | FourSeason Resort</title>
    <link href="css/login.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
        }

        .nav-bar {
            display: flex;
            justify-content: center;
            background: #333;
            padding: 10px;
        }

        .nav-bar a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        .nav-bar a:hover {
            background: #575757;
            border-radius: 5px;
        }

        .container {
            margin: 50px auto;
            text-align: center;
            max-width: 800px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            color: #333;
        }

        .back {
            background-color: #ff5733; /* Different color for the "Go Back" button */
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .back:hover {
            background: #c44d2d; /* Different hover color for the "Go Back" button */
        }
    </style>
</head>

<body>

<div class="header">
    <h2>Admin Dashboard</h2>
</div>

<div class="nav-bar">
    <a href="display_user.php" class="back">Go Back</a>
    <a href="home-admin.php">Home Page Management</a>
    <a href="edit-about.php">About Page Management</a>
    <a href="update-con.php">Contact Page Management</a>
</div>

<div class="container">
    <h2>Welcome to the Admin Panel</h2>
    <p>Use the navigation menu above to manage different sections of the website.</p>
</div>

</body>
</html>

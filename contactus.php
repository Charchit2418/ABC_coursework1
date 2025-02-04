<?php 
session_start();
include("admin/connect.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .nav {
            background: #333;
            padding: 10px 0;
            text-align: center;
        }
        .nav ul {
            list-style: none;
            padding: 0;
        }
        .nav ul li {
            display: inline;
            margin: 0 15px;
        }
        .nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .nav ul li a:hover {
            text-decoration: underline;
        }
        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>

<body>

<!-- Dynamic Navigation Bar -->
<div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contactus.php">Contact</a></li>

        <?php if(isset($_SESSION["user"])): ?>
            <li><a href="roomdisplay.php">Accommodation</a></li>
            <li><a href="myprofile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="gallery.php">Accommodation</a></li>
            <li><a href="guest-login.php">Log In</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php 
$sql = "SELECT contact FROM contact";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="contact-container">
    <h1>Contact Us</h1>
    <p><?php echo $row["contact"]; ?></p>
</div>

<?php include("footer.php"); ?>

</body>
</html>

<?php 
session_start();
include("admin/connect.php");
?>
<?php if (!isset($con)) {
    die("Database connection not established.");
}
?>
<?php
if (isset($_POST["login"])) {
    $uname = $_POST["username"];
    $password = $_POST["pwd"];
    $sql = "SELECT * FROM guest_record WHERE username='$uname' AND password='$password'";
    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["user"] = $row["username"];
        header("Location: roomdisplay.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <title>Guest Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        .container h3 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            color: #555;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .footer-links {
            text-align: center;
            margin-top: 20px;
        }
        .footer-links a {
            color: #007bff;
            text-decoration: none;
        }
        .footer-links a:hover {
            text-decoration: underline;
            /*end here*/
        }
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

<div class="container">
    <h3>Guest Login</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" required />
        </div>
        <button type="submit" name="login" class="btn">Log In</button>
    </form>
    <div class="footer-links">
        <a href="user-forget-password.php">Forgot Password?</a>
        <p>Don't have an account? <a href="user-reg.php">Register Now</a></p>
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>

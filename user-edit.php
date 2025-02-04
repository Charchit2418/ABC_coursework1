<?php
session_start();
include("admin/connect.php");

// Redirect guests to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: guest-login.php");
    exit;
}

// Fetch the logged-in user ID
$user_id = $_SESSION["user_id"];

// Handle profile update
if (isset($_POST["edituser"])) {
    $firstname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);

    $sql = "UPDATE guest_record 
            SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone' 
            WHERE id=$user_id";

    if (mysqli_query($con, $sql)) {
        header("Location: myprofile.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Fetch user details for the form
$sql = "SELECT * FROM guest_record WHERE id=$user_id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 400px;
            background: #fff;
            padding: 20px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[readonly] {
            background: #eee;
        }
        .btn {
            width: 100%;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="css/nav.css">
<div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contactus.php">Contact</a></li>

        <?php if(isset($_SESSION["user_id"])): ?>
            <li><a href="roomdisplay.php">Accommodation</a></li>
            <li><a href="myprofile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="gallery.php">Accommodation</a></li>
            <li><a href="guest-login.php">Log In</a></li>
        <?php endif; ?>
    </ul>
</div>

<!-- User Edit Form -->
<div class="container">
    <h3>Edit Profile</h3>
    
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="fname" value="<?php echo $data["firstname"]; ?>" required />

        <label>Last Name</label>
        <input type="text" name="lname" value="<?php echo $data["lastname"]; ?>" required />

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $data["email"]; ?>" required />

        <label>Username</label>
        <input type="text" value="<?php echo $data["username"]; ?>" readonly />

        <label>Gender</label>
        <input type="text" value="<?php echo ucfirst($data['gender']); ?>" readonly />

        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $data["phone"]; ?>" required />

        <button type="submit" name="edituser" class="btn">Update</button>
    </form>
</div>

</body>
</html>

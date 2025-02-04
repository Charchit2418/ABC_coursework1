<?php 
session_start();
include("admin/connect.php");

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$query = "SELECT * FROM guest_record WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if (!$row) {
    echo "<div class='message error'>User data not found.</div>";
    exit;
}

$full_name = $row['firstname'] . " " . $row["lastname"];
$phone = $row['phone'];
$user = $row['username'];
$email = $row['email'];
$gender = $row['gender'];

$booking_query = "SELECT COUNT(*) AS total FROM roombooked WHERE username ='$user'";
$booking_result = mysqli_query($con, $booking_query);
$booking_data = mysqli_fetch_assoc($booking_result);
$total_bookings = $booking_data['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Four Season Resort - Profile</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nav.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        .profile-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .profile-table th, .profile-table td {
            padding: 10px;
            border: 1px solid white;
            text-align: left;
        }
        .profile-table th {
            background-color: #444;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .edit-profile {
            background-color: #008CBA;
        }
        .change-password {
            background-color: #f44336;
        }
        .edit-profile:hover {
            background-color: #005f75;
        }
        .change-password:hover {
            background-color: #c9302c;
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
        <h2>Welcome, <?php echo $_SESSION["user"]; ?>!</h2>
        
        <table class="profile-table">
            <tr>
                <th colspan="2">Your Information</th>
            </tr>
            <tr>
                <td><strong>Full Name:</strong></td>
                <td><?php echo $full_name; ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td><?php echo $phone; ?></td>
            </tr>
            <tr>
                <td><strong>Username:</strong></td>
                <td><?php echo $user; ?></td>
            </tr>
            <tr>
                <td><strong>Gender:</strong></td>
                <td><?php echo ucfirst($gender); ?></td>
            </tr>
            <tr>
                <td><strong>Bookings:</strong></td>
                <td><?php echo $total_bookings; ?> </td>
            </tr>
        </table>

        <div class="buttons">
            
        <a href="user-booking-record.php?un=<?php echo $user; ?>" class="edit-profile">View Bookings</a>
            <a href="user-edit.php?id=<?php echo $id; ?>" class="edit-profile">Edit Profile</a>
            <a href="user-password-change.php?id=<?php echo $id; ?>" class="change-password">Change Password</a>
        </div>
    </div>

    <div class="footer">
        <?php include("footer.php"); ?>
    </div>
</body>
</html>

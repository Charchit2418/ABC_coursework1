<?php
session_start();
include("admin/connect.php");

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<div class='message error'>Direct access is not allowed.</div>";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM roomupload WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (!$row) {
    echo "<div class='message error'>Room not found.</div>";
    exit;
}

$status = $row['status'];
$image = $row['image'];
$type = $row['type'];
$roomNo = $row['room_no'];
$price = $row['price'];

$ids = $_SESSION['user_id'];
$s = "SELECT * FROM guest_record WHERE id = $ids";
$r = mysqli_query($con, $s);
$userData = mysqli_fetch_assoc($r);

if (!$userData) {
    echo "<div class='message error'>User data not found.</div>";
    exit;
}

$full_name = $userData['firstname'] . ' ' . $userData['lastname'];
$username = $userData['username'];
$email = $userData['email'];
$phone = $userData['phone'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $errors = [];

    if (strtotime($startDate) >= strtotime($endDate)) {
        $errors[] = "End date must be after the start date.";
    }

    if ($status !== 'available') {
        $errors[] = "This room is currently unavailable.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO roombooked (username, full_name, type, email, phone, price, room_no, booking_date, end_date, status, date)
                VALUES ('$username', '$full_name', '$type', '$email', '$phone', '$price', '$roomNo', '$startDate', '$endDate', 'booked', NOW())";

        if (mysqli_query($con, $sql)) {
            $updateStatus = "UPDATE roomupload SET status='unavailable' WHERE id='$id'";
            mysqli_query($con, $updateStatus);
            $message = "<div class='message success'>Booking successful!</div>";
        } else {
            $message = "<div class='message error'>Error: " . mysqli_error($con) . "</div>";
        }
    } else {
        foreach ($errors as $error) {
            $message .= "<div class='message error'>$error</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Room Booking</title>
    <link href="css/menu.css" rel="stylesheet">
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
        .message {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
        }
        .success {
            background-color: #4CAF50;
            color: white;
        }
        .error {
            background-color: #ff4444;
            color: white;
        }
        img {
            max-width: 100%;
            border-radius: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin: 10px 0 5px;
            font-size: 18px;
        }
        input {
            padding: 8px;
            width: 80%;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #005f75;
        }
/*end*/
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
        <h1>Room Booking</h1>

        <?php echo $message; ?>

        <img src="<?php echo $image; ?>" alt="Room Image">

        <form method="POST">
            <label>Start Date:</label>
            <input type="date" name="start_date" required>

            <label>End Date:</label>
            <input type="date" name="end_date" required>

            <button type="submit">Book</button>
        </form>
    </div>
</body>
</html>

<?php 
session_start();
include("admin/connect.php");

// Prevent direct access
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: index.php"); // Redirect to home page
    exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resort</title>
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
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .product {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product img {
            border-radius: 5px;
            margin: 10px;
        }
        .room-details {
            text-align: center;
            margin-top: 10px;
        }
        button {
            background: green;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: darkgreen;
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
        <li><a href="roomdisplay.php">Accommodation</a></li>

        <?php if(isset($_SESSION["user"])): ?>
            <li><a href="myprofile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="guest-login.php">Log In</a></li>
        <?php endif; ?>
    </ul>
</div>

<div class="container">
    <h2>Welcome to Our Resort</h2>

    <?php if (isset($_SESSION["user"])): ?>
        <h2><a href="logout.php">LOGOUT</a></h2>

        <div class="product">
            <?php
            $_SESSION["roomdisplay"] = "login";
            $query = "SELECT * FROM roomupload";
            $result = mysqli_query($con, $query);
            
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="room">
                        <img src="<?php echo $row['image']; ?>" height="300px" width="400px" />
                        <div class="room-details">
                            <h3>Room No: <?php echo $row['room_no']; ?></h3>
                            <h3>Price per Night: <?php echo $row['price']; ?></h3>
                            <h3>Type: <?php echo $row['type']; ?></h3>
                            <h3>Status: <?php echo $row['status']; ?></h3>
                            <a href="roombooked.php?id=<?php echo $row['id']; ?>"><button>BOOK NOW</button></a>
                        </div>
                    </div>
            <?php 
                } 
            } 
            ?>
        </div>

    <?php else: ?>
        <h3 style="text-align:center;">Please <a href="guest-login.php">Log In</a> to view and book rooms.</h3>
    <?php endif; ?>
</div>

<?php include("footer.php"); ?>

</body>
</html>

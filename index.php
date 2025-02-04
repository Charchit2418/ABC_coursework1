<?php
session_start();
include("admin/connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resorts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/nav.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- Dynamic Navigation Bar -->
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

<?php
include("header.php");

?>
<?php
// Fetch logo image
$query = "SELECT image FROM logo WHERE id=3";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<div class="main-content">
    <div class="left-content">
        <?php echo '<img src="admin/logoupload/' . $row["image"] . '" height="400px" width="100%">' ?>
    </div>

    <?php 
    // Fetch homepage content
    $sql = "SELECT content FROM home";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="right-content">
        <p><br><?php echo $row["content"]; ?></p>
    </div>
</div>

<?php include("footer.php"); ?>

</body>
</html>

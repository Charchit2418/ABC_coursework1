<?php
include("admin/connect.php");

// Get the booking ID from the URL
$id = $_GET["id"];

// Get the username of the user who made the booking
$usernameQuery = mysqli_query($con, "SELECT username FROM roombooked WHERE id=$id");
$usernameResult = mysqli_fetch_assoc($usernameQuery);
$user = $usernameResult['username'];

// Delete the booking record
$deleteQuery = "DELETE FROM roombooked WHERE id=$id";
if (!mysqli_query($con, $deleteQuery)) {
    die("Error deleting record: " . mysqli_error($con));
}

// Update the room status to 'available'
$updateQuery = "UPDATE roomupload SET status='available' WHERE id=$id";
if (!mysqli_query($con, $updateQuery)) {
    die("Error updating room status: " . mysqli_error($con));
}

// Redirect to the user booking record page with the username
header('Location: user-booking-record.php?un=' . urlencode(strtoupper(htmlspecialchars($user))));
exit;
?>

<?php
if(isset($_GET["id"])) {
    include("connect.php");
    
    $id = $_GET["id"];
    $sql = "DELETE FROM roomupload WHERE id=$id";
    
    if(mysqli_query($con, $sql)) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Error deleting record: " . mysqli_error($con);
    }
    
    // Redirect after a brief pause (e.g., 2 seconds)
    header("refresh:2; url=/myprojectnew/myprojectnew/admin/room-edit.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .message {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="message">
        <?php 
        if(isset($message)) {
            // Display message based on success or error
            echo "<p class='" . (strpos($message, 'Error') === false ? 'success' : 'error') . "'>$message</p>";
        }
        ?>
    </div>
</body>
</html>

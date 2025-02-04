<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

session_start();
include("connect.php");

// Handle form submission
if (isset($_POST["add"])) {
    $roomno = mysqli_real_escape_string($con, $_POST["roomno"]);
    $type = mysqli_real_escape_string($con, $_POST["type"]);
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $price = mysqli_real_escape_string($con, $_POST["price"]);

    if ($_FILES["room_image"]["error"] == UPLOAD_ERR_OK) {
        $image = $_FILES["room_image"]["name"];
        move_uploaded_file($_FILES["room_image"]["tmp_name"], 'roomimage/' . $_FILES["room_image"]["name"]);
    } else {
        $image = ''; // Set a default value or handle the error as needed
    }

    $query = "INSERT INTO roomupload(room_no, type, status, price, image) VALUES('$roomno', '$type', '$status', '$price', '$image')";

    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:roomupload.php");
        exit;
    } else {
        echo "<div style='color:red; text-align:center;'>Error adding product: " . mysqli_error($con) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .back-btn {
            background-color: #6c757d; /* Gray color for back button */
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            display: inline-block;
            border-radius: 4px;
        }
        .submit-btn {
            background-color: #28a745; /* Green color for submit button */
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            display: inline-block;
            border-radius: 4px;
        }
        .back-btn:hover,
        .submit-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Product Add</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Room No:</td>
                    <td><input type="text" name="roomno" required /></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><input type="text" name="type" required /></td>
                </tr>
                <tr>
                    <td>Room Status:</td>
                    <td><input type="text" name="status" required /></td>
                </tr>
                <tr>
                    <td>Room Price:</td>
                    <td><input type="text" name="price" required /></td>
                </tr>
                <tr>
                    <td>Upload Photo:</td>
                    <td><input type="url" name="room_image" required /></td>
                </tr>
            </table>
            <input type="submit" name="add" value="Add Product" class="submit-btn" />
            <button type="button" onclick="window.history.back()" class="back-btn">Back</button>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
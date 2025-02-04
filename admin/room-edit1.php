<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");

if (isset($_POST["update"])) {
    $id = $_GET["id"];
    $name = $_POST["room_no"];
    $cat = $_POST["type"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    $imageUrl = $_POST["image_url"];

    $image = $data["image"]; // Default to the current image

    if (!empty($_FILES["product_image"]["name"])) {
        $image = $_FILES["product_image"]["name"];
        move_uploaded_file($_FILES["product_image"]["tmp_name"], 'roomimage/' . $_FILES["product_image"]["name"]);
    } elseif (!empty($imageUrl)) {
        $image = $imageUrl;
    }

    $query = "UPDATE roomupload SET room_no='$name', type='$cat', status='$status', image='$image', price='$price' WHERE id=$id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:room-edit.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

$id = $_GET["id"];
$query = "SELECT * FROM roomupload WHERE id=$id";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="file"], input[type="url"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Room</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label for="room_no">Room No</label>
            <input type="text" id="room_no" name="room_no" value="<?php echo htmlspecialchars($data["room_no"]); ?>" required />

            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($data["status"]); ?>" required />

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($data["price"]); ?>" required />

            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($data["type"]); ?>" required />

            <label for="image_url">Enter Image URL</label>
            <input type="url" id="image_url" name="image_url" placeholder="http://example.com/image.jpg" value="<?php echo htmlspecialchars($data["image"]); ?>" required />

            <input type="submit" name="update" value="Update" />
        </form>
    </div>
</body>
</html>

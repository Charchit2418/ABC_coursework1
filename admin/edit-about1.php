<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");

// Handle form submission
if (isset($_POST["edit"])) {
    $id = intval($_POST["id"]);
    $name = mysqli_real_escape_string($con, $_POST["description"]);

    $sql = "UPDATE about SET content='$name' WHERE id=$id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: edit-about.php");
        exit;
    } else {
        echo "<div style='color:red; text-align:center;'>Error updating record: " . mysqli_error($con) . "</div>";
    }
}

// Check if ID is set and valid
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: edit-about.php");
    exit;
}

$id = intval($_GET["id"]); // Ensure the ID is an integer to prevent SQL injection

$sql = "SELECT * FROM about WHERE id=$id";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("<div style='color:red; text-align:center;'>Query failed: " . mysqli_error($con) . "</div>");
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .main {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .user_add h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user_add form {
            display: flex;
            flex-direction: column;
        }
        .user_add textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            resize: vertical;
        }
        .user_add input[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .user_add input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="user_add">
            <h3>Page Edit</h3>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>" />
                
                Description:<br>
                <textarea rows="10" cols="10" name="description"><?php echo htmlspecialchars($data["content"]); ?></textarea>
                <br /><br />
                
                <input type="submit" name="edit" value="Update" />
            </form>
        </div>
    </div>
    <hr>
    <?php include("footer.php"); ?>
</body>
</html>
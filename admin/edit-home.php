<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");

// Handle form submission
if (isset($_POST["edit"])) {
    $id = intval($_POST["id"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    $sql = "UPDATE home SET title='$name', content='$description' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: home-admin.php");
        exit;
    } else {
        echo "<div style='color:red; text-align:center;'>Error updating record: " . mysqli_error($con) . "</div>";
    }
}

// Check if ID is set and valid
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: home-admin.php");
    exit;
}

$id = intval($_GET["id"]); // Ensure the ID is an integer to prevent SQL injection

$sql = "SELECT * FROM home WHERE id=$id";
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
    <title>Page Edit</title>
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
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user_add {
            display: flex;
            flex-direction: column;
        }
        .user_add input[type="text"],
        .user_add textarea,
        .user_add input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .update-btn {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .update-btn:hover,
        .update-btn:active {
            background-color: #218838;
        }
        .cancel-btn {
            background-color: #dc3545;
            color: white;
            cursor: pointer;
        }
        .cancel-btn:hover,
        .cancel-btn:active {
            background-color: #c82333;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["form"]["name"].value;
            var description = document.forms["form"]["description"].value;
            if (name == "" || name.length < 2) {
                alert("Please enter a valid name.");
                return false;
            }
            if (description == "") {
                alert("Please enter a valid description.");
                return false;
            }
            return true;
        }

        function cancelEdit() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="main">
        <div class="user_add">
            <h3>Page Edit</h3>
            <form action="" method="post" id="form" onsubmit="return validateForm()">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>" />
                Name:<br>
                <input type="text" name="name" value="<?php echo htmlspecialchars($data["title"]); ?>" /><br />
                Description:<br>
                <textarea rows="10" cols="10" name="description"><?php echo htmlspecialchars($data["content"]); ?></textarea><br />
                <input type="submit" name="edit" value="Update" class="update-btn" />
                <button type="button" onclick="cancelEdit()" class="cancel-btn">Cancel</button>
            </form>
        </div>
    </div>
    <hr>
    <?php include("footer.php"); ?>
</body>
</html>
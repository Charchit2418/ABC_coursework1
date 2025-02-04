<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");
include("dash.php");

// Handle form submission
if (isset($_POST["edituser"])) {
    $id = intval($_POST["userid"]);
    $firstname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $post = mysqli_real_escape_string($con, $_POST["post"]);
    $salary = mysqli_real_escape_string($con, $_POST["salary"]);
    $date = mysqli_real_escape_string($con, $_POST["datejoin"]);

    $sql = "UPDATE employee_record SET firstname='$firstname', lastname='$lastname', email='$email', gender='$gender', phone='$phone', address='$address', post='$post', salary='$salary', date_of_join='$date' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        header("Location: employee-record.php");
        exit;
    } else {
        echo "<div style='color:red; text-align:center;'>Error updating record: " . mysqli_error($con) . "</div>";
    }
}

// Check if ID is set and valid
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: employee-record.php");
    exit;
}

$id = intval($_GET["id"]); // Ensure the ID is an integer to prevent SQL injection

$sql = "SELECT * FROM employee_record WHERE id=$id";
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
    <title>User Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea,
        .form-container input[type="submit"],
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="radio"] {
            margin-right: 10px;
        }
        .back-btn {
            background-color: #6c757d; /* Gray color for back button */
        }
        .update-btn {
            background-color: #28a745; /* Green color for update button */
        }
        .back-btn:hover,
        .update-btn:hover {
            opacity: 0.8;
        }
    </style>
    <script>
        function confirmCancel() {
            return confirm('Are you sure you want to cancel? Any unsaved changes will be lost.');
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h3>User Edit</h3>
        <form action="" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="userid" value="<?php echo htmlspecialchars($id); ?>" />
            Firstname:<br>
            <input type="text" name="fname" value="<?php echo htmlspecialchars($data["firstname"]); ?>" /><br><br>
            
            Lastname:<br>
            <input type="text" name="lname" value="<?php echo htmlspecialchars($data["lastname"]); ?>" /><br><br>
            
            Email:<br>
            <input type="text" name="email" value="<?php echo htmlspecialchars($data["email"]); ?>" /><br><br>
            
            Address:<br>
            <input type="text" name="address" value="<?php echo htmlspecialchars($data["address"]); ?>" /><br><br>
            
            Gender:<br>
            <input name="gender" type="radio" value="male" <?php if ($data['gender'] == "male") { echo "checked"; } ?> /> Male
            <input name="gender" type="radio" value="female" <?php if ($data['gender'] == "female") { echo "checked"; } ?> /> Female<br><br><br>
            
            Phone:<br>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($data["phone"]); ?>" /><br><br>
            
            Post:<br>
            <input type="text" name="post" value="<?php echo htmlspecialchars($data["post"]); ?>" /><br><br>
            
            Salary:<br>
            <input type="text" name="salary" value="<?php echo htmlspecialchars($data["salary"]); ?>" /><br><br>
            
            Date of Join:<br>
            <input type="text" name="datejoin" value="<?php echo htmlspecialchars($data["date_of_join"]); ?>" /><br><br>
            
            <input type="submit" name="edituser" value="Update" class="update-btn" />
            <button type="button" onclick="window.history.back()" class="back-btn">Cancel</button>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
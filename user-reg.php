<?php
session_start();
include("admin/connect.php");
?>
<?php
if (isset($_POST["send"])) {
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $emails = $_POST["email"];
    $usern = $_POST["uname"];
    $pas = $_POST["password"];
    $gender = @$_POST["gender"];
    $ph = $_POST["phone"];
    @$answer = $_POST["question"];

    $errors = array();

    if (empty($_POST["first_name"])) {
        $errors["first_name1"] = "Please fill in your first name.";
    } elseif (strlen($_POST["first_name"]) < 2) {
        $errors["first_name2"] = "First name must be at least 2 characters long.";
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $firstname)) {
        $errors["first_name3"] = "First name can only contain letters.";
    } else {
        $firstname = test_input($_POST['first_name']);
    }

    if (empty($_POST["last_name"])) {
        $errors["last_name1"] = "Please fill in your last name.";
    } elseif (strlen($_POST["last_name"]) < 2) {
        $errors["last_name2"] = "Last name must be at least 2 characters long.";
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $lastname)) {
        $errors["last_name3"] = "Last name can only contain letters.";
    } else {
        $lastname = test_input($_POST['last_name']);
    }

    if (empty($_POST["email"])) {
        $errors["email1"] = "Please fill in your email.";
    } elseif (strlen($_POST["email"]) < 6) {
        $errors["email2"] = "Email must be at least 6 characters long.";
    }

    if (empty($_POST["uname"])) {
        $errors["uname1"] = "Please fill in your username.";
    } elseif (strlen($_POST["uname"]) < 5) {
        $errors["uname2"] = "Username must be at least 5 characters long.";
    } elseif (!preg_match('/^[a-zA-Z]{1}[a-zA-Z0-9_-]{5,}$/', $usern)) {
        $errors["uname3"] = "Invalid username format.";
    } else {
        $usern = test_input($_POST['uname']);
    }

    if (empty($_POST["password"])) {
        $errors["password1"] = "Please fill in your password.";
    } elseif (strlen($_POST["password"]) < 5) {
        $errors["password2"] = "Password must be at least 5 characters long.";
    }

    if (empty($_POST["gender"])) {
        $errors["gender1"] = "Please select your gender.";
    }

    if (empty($_POST["phone"])) {
        $errors["phone1"] = "Please fill in your phone number.";
    } elseif (strlen($_POST["phone"]) != 10 || !preg_match("/^[0-9]{10}$/", $ph)) {
        $errors["phone2"] = "Phone number must be 10 digits long.";
    } else {
        $ph = test_input($_POST["phone"]);
    }

    if (empty($_POST["question"])) {
        $errors["question1"] = "Please answer the security question.";
    }

    if (count($errors) == 0) {
        $sql = "SELECT id FROM guest_record WHERE email='$emails'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors["email3"] = "The email address is already registered.";
        }

        $sql = "SELECT id FROM guest_record WHERE username='$usern'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors["uname4"] = "The username is already registered.";
        }

        $sql = "SELECT id FROM guest_record WHERE phone='$ph'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors["phone3"] = "The phone number is already registered.";
        } else {
            $sql = "INSERT INTO guest_record(firstname, lastname, email, username, password, gender, phone, answer)
                    VALUES('$firstname', '$lastname', '$emails', '$usern', '$pas', '$gender', '$ph', '$answer')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $registrationSuccess = true;
            }
        }
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .btn:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
        .success {
            color: green;
            margin-top: 20px;
            text-align: center;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php include("header.php"); ?>
<div class="container">
    <h2>Registration</h2>
    <?php if (isset($registrationSuccess) && $registrationSuccess): ?>
        <p class="success">User registered successfully!</p>
    <?php endif; ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php if (isset($_POST["first_name"])) echo $_POST["first_name"]; ?>">
            <?php if (isset($errors["first_name1"])) echo "<p class='error'>{$errors['first_name1']}</p>"; ?>
            <?php if (isset($errors["first_name2"])) echo "<p class='error'>{$errors['first_name2']}</p>"; ?>
            <?php if (isset($errors["first_name3"])) echo "<p class='error'>{$errors['first_name3']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php if (isset($_POST["last_name"])) echo $_POST["last_name"]; ?>">
            <?php if (isset($errors["last_name1"])) echo "<p class='error'>{$errors['last_name1']}</p>"; ?>
            <?php if (isset($errors["last_name2"])) echo "<p class='error'>{$errors['last_name2']}</p>"; ?>
            <?php if (isset($errors["last_name3"])) echo "<p class='error'>{$errors['last_name3']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>">
            <?php if (isset($errors["email1"])) echo "<p class='error'>{$errors['email1']}</p>"; ?>
            <?php if (isset($errors["email2"])) echo "<p class='error'>{$errors['email2']}</p>"; ?>
            <?php if (isset($errors["email3"])) echo "<p class='error'>{$errors['email3']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="uname" value="<?php if (isset($_POST["uname"])) echo $_POST["uname"]; ?>">
            <?php if (isset($errors["uname1"])) echo "<p class='error'>{$errors['uname1']}</p>"; ?>
            <?php if (isset($errors["uname2"])) echo "<p class='error'>{$errors['uname2']}</p>"; ?>
            <?php if (isset($errors["uname3"])) echo "<p class='error'>{$errors['uname3']}</p>"; ?>
            <?php if (isset($errors["uname4"])) echo "<p class='error'>{$errors['uname4']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors["password1"])) echo "<p class='error'>{$errors['password1']}</p>"; ?>
            <?php if (isset($errors["password2"])) echo "<p class='error'>{$errors['password2']}</p>"; ?>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male") echo "checked"; ?>> Male
            <input type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female") echo "checked"; ?>> Female
            <?php if (isset($errors["gender1"])) echo "<p class='error'>{$errors['gender1']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php if (isset($_POST["phone"])) echo $_POST["phone"]; ?>">
            <?php if (isset($errors["phone1"])) echo "<p class='error'>{$errors['phone1']}</p>"; ?>
            <?php if (isset($errors["phone2"])) echo "<p class='error'>{$errors['phone2']}</p>"; ?>
            <?php if (isset($errors["phone3"])) echo "<p class='error'>{$errors['phone3']}</p>"; ?>
        </div>
        <div class="form-group">
            <label for="question">Security Question (e.g., Favorite color?):</label>
            <input type="text" id="question" name="question" value="<?php if (isset($_POST["question"])) echo $_POST["question"]; ?>">
            <?php if (isset($errors["question1"])) echo "<p class='error'>{$errors['question1']}</p>"; ?>
        </div>
        <button type="submit" name="send" class="btn">Sign Up</button>
    </form>
    <div class="login-link">
        <p>Already logged in? <a href="guest-login.php">Go to Login</a></p>
    </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>

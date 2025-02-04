<?php
session_start();
include("connect.php");

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "Direct access is not allowed.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user_add {
            display: flex;
            flex-direction: column;
        }
        .user_add h3 {
            margin-top: 10px;
        }
        .user_add input[type="text"],
        .user_add input[type="email"],
        .user_add input[type="phone"],
        .user_add input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .user_add input[type="radio"] {
            margin-right: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }

        /* Auto-positioned Back Button */
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function validateForm() {
            var firstName = document.forms["form"]["first_name"].value;
            var lastName = document.forms["form"]["last_name"].value;
            var email = document.forms["form"]["email"].value;
            var gender = document.forms["form"]["gender"].value;
            var phone = document.forms["form"]["phone"].value;
            var address = document.forms["form"]["address"].value;

            if (firstName == "" || firstName.length < 2 || !/^[a-zA-Z'-]+$/.test(firstName)) {
                alert("Please enter a valid first name.");
                return false;
            }
            if (lastName == "" || lastName.length < 2 || !/^[a-zA-Z'-]+$/.test(lastName)) {
                alert("Please enter a valid last name.");
                return false;
            }
            if (email == "" || email.length < 6) {
                alert("Please enter a valid email.");
                return false;
            }
            if (!gender) {
                alert("Please select a gender.");
                return false;
            }
            if (phone == "" || phone.length != 10 || !/^[0-9]{10}$/.test(phone)) {
                alert("Please enter a valid phone number.");
                return false;
            }
            if (address == "" || address.length < 2) {
                alert("Please enter a valid address.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<!-- Auto-positioned Back Button -->
<button class="back-btn" onclick="window.location.href='employee-record.php'">Back</button>

<div class="main">
    <div class="user_add">
        <h2>REGISTRATION</h2><br>
        <form action="" method="POST" id="form" onsubmit="return validateForm()">
            <h3>First Name:</h3>
            <input type="text" name="first_name" />

            <h3>Last Name:</h3>
            <input type="text" name="last_name" />

            <h3>Email:</h3>
            <input type="email" name="email" />

            <h3>Gender:</h3>
            <label>
                <input type="radio" name="gender" value="male" /> Male
            </label>
            <label>
                <input type="radio" name="gender" value="female" /> Female
            </label>

            <h3>Phone:</h3>
            <input type="text" name="phone" />

            <h3>Address:</h3>
            <input type="text" name="address" />

            <h3>Post:</h3>
            <input type="text" name="post" />

            <h3>Salary:</h3>
            <input type="text" name="salary" />

            <h3>Date of Join:</h3>
            <input type="text" name="joindate" />

            <input type="submit" name="send" value="Sign Up" />
        </form>
    </div>
</div>

<?php include("footer.php"); ?>
</body>
</html>

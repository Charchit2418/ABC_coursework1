<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 50px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin: 8px 0;
            font-weight: bold;
        }
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-container .message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Change Password</h2>
        <form name="newprwd" action="" method="post">
            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" value="" required><br>

            <label for="password">Current Password:</label>
            <input type="password" id="password" name="password" value="" required><br>

            <label for="newpassword">New Password:</label>
            <input type="password" id="newpassword" name="newpassword" value="" required><br>

            <label for="confirmnewpassword">Confirm New Password:</label>
            <input type="password" id="confirmnewpassword" name="confirmnewpassword" value="" required><br>

            <input type="submit" name="submit" value="Submit"><br>
        </form>

        <?php
            if(isset($_POST['submit'])) {
                $mail = trim($_POST['mail']); 
                $password = trim($_POST['password']);
                $newpassword = trim($_POST['newpassword']);
                $confirmnewpassword = trim($_POST['confirmnewpassword']);

                // Sanitize email input
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='message'>Please enter a valid email address.</div>";
                } else {
                    $result = mysqli_query($con, "SELECT password FROM guest_record WHERE email='$mail'");

                    if(mysqli_num_rows($result) == 0) {
                        echo "<div class='message'>The email entered does not exist!</div>";
                    } else {
                        // Fetch the current password from the database
                        $row = mysqli_fetch_assoc($result);
                        $db_password = $row['password'];

                        // Verify current password
                        if ($password != $db_password) {
                            echo "<div class='message'>Entered an incorrect password.</div>";
                        } else {
                            // Check if new password and confirm password match
                            if($newpassword == $confirmnewpassword) {
                                // Update password in the database
                                $sql = "UPDATE guest_record SET password = '$newpassword' WHERE email = '$mail'";
                                $update_result = mysqli_query($con, $sql);

                                if ($update_result) {
                                    echo "<div class='message' style='color: green;'>Congratulations, password successfully changed!</div>";
                                } else {
                                    echo "<div class='message'>There was an error updating the password.</div>";
                                }
                            } else {
                                echo "<div class='message'>New password and confirm password must be the same!</div>";
                            }
                        }
                    }
                }
            }
        ?>
    </div>
</body>
</html>

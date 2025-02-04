<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link href="css/login.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .wrap {
        width: 350px;
        padding: 20px;
        background: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
    }

    h3 {
        color: #333;
        margin-bottom: 20px;
    }

    .form input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    .form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .links a {
        text-decoration: none;
        color: #007bff;
        font-size: 14px;
        display: block;
        margin-top: 10px;
    }

    .links a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>

<div class="wrap">
    <h3>Admin Login</h3>

    <?php
    session_start();
    include("connect.php");

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$pwd'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            $_SESSION["login"] = "login";
            header("Location: dash.php");
            exit;
        } else {
            echo '<div class="error">Invalid username or password</div>';
        }
    }
    ?>

    <div class="form">
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="pwd" placeholder="Password" required />
            <input type="submit" name="login" value="Log In" />
        </form>
    </div>

    <div class="links">
        <a href="forget-password.php">Forgot Username or Password?</a>
        <a href="../index.php">Back to Home</a>
    </div>
</div>

</body>
</html>

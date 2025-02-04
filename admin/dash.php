<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $current_url;
    echo "Direct access is not allowed";
    exit;
} else {                                                                
?>      
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/dashboard.css" rel="stylesheet" type="text/css"/>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            width: 100%;
            background: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: #575757;
        }
        .content {
            margin-top: 20px;
            text-align: center;
        }
        .logout {
            text-align: center;
            margin: 20px 0;
        }
        .logout a {
            color: red;
            font-size: 18px;
            text-decoration: none;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="Logout.php">Logout</a>
    </div>
    
    <div class="sidebar">
        <a href="display_user.php">Guest User Management</a>
        <a href="logoupload.php">Management Section</a>
        <a href="room-reserved.php">Room Booked</a>
        <a href="employee-record.php">Employee Management</a>
        <a href="room-edit.php">Accommodation & Rates</a>
    </div>
    
    </div>
</body>
</html>
<?php } ?>

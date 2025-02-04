<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "Direct access is not allowed.";
    exit;
}

include("connect.php");

// Handle delete action (if needed)
// You can add similar logic as in the previous example if you want to handle deletes here

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h3 {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        .search {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
            padding: 20px;
        }
        .search form {
            display: flex;
            align-items: center;
        }
        .search input[type="text"] {
            padding: 10px;
            margin-right: 10px;
        }
        .search input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .box {
            width: 90%;
            margin: 20px auto;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
        .delete-btn {
            color: red;
        }
        .delete-btn:hover {
            text-decoration: underline;
        }
        .header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this employee?');
        }
    </script>
</head>
<body>
<div class="header">
        <h2>Welcome to Admin Dashboard</h2>
    </div>
    <?php include("dash.php"); ?>
    <div class="search">
        <span style='color:white'>
            <h3>Employee Management</h3>
            <form action="" method="post">
                Firstname: <input type="text" name="firstname" />&nbsp;&nbsp;
                <input type="submit" name="search" value="Go" />
            </form>
        </span>
    </div>

    <div class="box">
        <table>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact no</th>
                <th>POST</th>
                <th>SALARY</th>
                <th>DateOfjoin</th>
                <th>Action</th>
            </tr>
            
            <?php
            if (isset($_POST["search"])) {
                $fname = mysqli_real_escape_string($con, $_POST["firstname"]);
                $sql = "SELECT * FROM employee_record WHERE firstname LIKE '%$fname%'";
            } else {
                $sql = "SELECT * FROM employee_record";
            }
            $result = mysqli_query($con, $sql);
            
            if (!$result) {
                die("<div style='color:red; text-align:center;'>Query failed: " . mysqli_error($con) . "</div>");
            }

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                <td><?php echo htmlspecialchars($row["firstname"]); ?></td>
                <td><?php echo htmlspecialchars($row["lastname"]); ?></td>
                <td><?php echo htmlspecialchars($row["email"]); ?></td>
                <td><?php echo htmlspecialchars($row["gender"]); ?></td>
                <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                <td><?php echo htmlspecialchars($row["post"]); ?></td>
                <td><?php echo htmlspecialchars($row["salary"]); ?></td>
                <td><?php echo htmlspecialchars($row["date_of_join"]); ?></td>
                <td>
                    <a href="edit-employee.php?id=<?php echo htmlspecialchars($row["id"]); ?>">Edit</a> 
                    <a href="delete-emp.php?id=<?php echo htmlspecialchars($row["id"]); ?>" onclick="return confirmDelete();" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <p style="text-align: center;"><a href="employee-register.php">New user</a></p>
</body>
</html>
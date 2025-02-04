<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");

$sql = "SELECT * FROM home";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("<div style='color:red; text-align:center;'>Query failed: " . mysqli_error($con) . "</div>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 95%;
            margin: 30px auto;
            border-collapse: collapse;
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
        button {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        a {
            text-decoration: none;
            color: white;
        }
        .edit-btn {
            background-color: #007bff;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .back-btn {
            background-color: #6c757d; /* Gray color for back button */
        }
        .edit-btn:hover {
            background-color: #0056b3;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .back-btn:hover {
            background-color: #5a6268; /* Darker gray on hover */
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
</head>
<body>
    <h2>Home Page Management</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                <td><?php echo htmlspecialchars($row["title"]); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row["content"])); ?></td>
                <td>
                    <a href="edit-home.php?id=<?php echo htmlspecialchars($row["id"]); ?>">
                        <button class="edit-btn">Edit</button>
                    </a>
                    <a href="delete_page.php?id=<?php echo htmlspecialchars($row["id"]); ?>" onclick="return confirmDelete();">
                        <button class="delete-btn">Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <hr />
    <!-- Back Button -->
    <div style="text-align: center;">
        <button class="back-btn" onclick="window.location.href='logoupload.php'">Back</button>
    </div>
    <hr />
    <?php include("footer.php"); ?>
</body>
</html>
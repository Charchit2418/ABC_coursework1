<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
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
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #007bff;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .back-btn {
            background-color: #6c757d; /* Gray color for back button */
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .back-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <?php
    include("connect.php");
    ?>
    <div class="container">
        <h2>Contact Page Management</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM contact";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo nl2br(htmlspecialchars($row["contact"])); ?></td>
                            <td>
                                <a href="update-con.php?id=<?php echo $row["id"]; ?>" class="btn btn-edit">Edit</a>
                                <a href="delete_contact.php?id=<?php echo $row["id"]; ?>" class="btn btn-delete" onclick="return confirmDelete();">Delete</a>
                            </td>
                        </tr>
                <?php 
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="3" style="text-align:center;">No records found.</td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
        <hr />
        
        <!-- Back Button -->
        <p style="text-align: center;">
        <button class="back-btn" onclick="window.location.href='logoupload.php'">Back</button>
        </p>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
    <?php include("footer.php"); ?>
</body>
</html>
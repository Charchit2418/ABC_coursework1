<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location:login.php");
    exit;
}

include("connect.php");

// Handle delete action
if (isset($_POST["delete"])) {
    $id = intval($_POST["id"]); // Ensure ID is an integer

    // Fetch reservation details to send email
    $query = "SELECT * FROM roombooked WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error fetching reservation details: " . mysqli_error($con));
    }

    $reservation = mysqli_fetch_assoc($result);

    if ($reservation) {
        $email = $reservation['email'];
        $full_name = htmlspecialchars($reservation['full_name']);
        $room_no = $reservation['room_no'];

        // Delete reservation
        $deleteQuery = "DELETE FROM roombooked WHERE id = $id";
        if (mysqli_query($con, $deleteQuery)) {
            // Send cancellation email
            $subject = "Reservation Cancellation Notice";
            $message = "Dear $full_name,\n\nYour reservation for Room No. $room_no has been cancelled by the admin. We apologize for any inconvenience caused.\n\nRegards,\nHotel Management";
            $headers = "From: admin@hotel.com";

            // Sending the email
            if (mail($email, $subject, $message, $headers)) {
                echo "<script>alert('Reservation cancelled and notice sent to $email.');</script>";
            } else {
                echo "<script>alert('Error sending cancellation notice to $email.');</script>";
            }

            // Redirect to refresh the page
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<script>alert('Error deleting reservation: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('Reservation not found.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input[type="text"], .search-bar input[type="submit"] {
            padding: 10px;
            margin: 5px;
        }
        .box {
            width: 90%;
            margin: 0 auto;
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
        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this reservation?');
        }
    </script>
</head>
<body>
    <div class="header">
        <h2>Welcome to Admin Dashboard</h2>
    </div>



    <?php include("dash.php"); ?>
    <div class="search-bar">
        <form action="" method="post">
            Firstname: <input type="text" name="firstname" />&nbsp;&nbsp;
            <input type="submit" name="search" value="Go" />
        </form>
    </div>
    <div class="box">
        <table>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Type</th>
                <th>Price</th>
                <th>Phone</th>
                <th>Room No</th>
                <th>Date of Booking</th>
                <th>End After Days</th>
                <th>Action</th>
            </tr>

            <?php
            if (isset($_POST["search"])) {
                $fname = mysqli_real_escape_string($con, $_POST["firstname"]);
                $sql = "SELECT * FROM roombooked WHERE firstname LIKE '%$fname%'";
            } else {
                $sql = "SELECT * FROM roombooked";
            }

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die("Error fetching reservations: " . mysqli_error($con));
            }

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                <td><?php echo htmlspecialchars($row["full_name"]); ?></td>
                <td><?php echo htmlspecialchars($row["username"]); ?></td>
                <td><?php echo htmlspecialchars($row["email"]); ?></td>
                <td><?php echo htmlspecialchars($row["type"]); ?></td>
                <td><?php echo htmlspecialchars($row["price"]); ?></td>
                <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                <td><?php echo htmlspecialchars($row["room_no"]); ?></td>
                <td><?php echo htmlspecialchars($row["booking_date"]); ?></td>
                <td><?php echo htmlspecialchars($row["end_date"]); ?></td>
                <td>
                    <!-- Delete button to cancel reservation -->
                    <form action="" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />
                        <input type="submit" name="delete" value="Delete Reservation" class="delete-btn" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

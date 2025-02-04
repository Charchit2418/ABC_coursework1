<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" />
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .nav {
            background: #333;
            padding: 10px 0;
            text-align: center;
        }
        .nav ul {
            list-style: none;
            padding: 0;
        }
        .nav ul li {
            display: inline;
            margin: 0 15px;
        }
        .nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .nav ul li a:hover {
            text-decoration: underline;
        }
        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>

<body>

<!-- Dynamic Navigation Bar -->
<div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contactus.php">Contact</a></li>

        <?php if(isset($_SESSION["user"])): ?>
            <li><a href="roomdisplay.php">Accommodation</a></li>
            <li><a href="myprofile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="gallery.php">Accommodation</a></li>
            <li><a href="guest-login.php">Log In</a></li>
        <?php endif; ?>
    </ul>
</div>
<div class="product1">
<?php
include("admin/connect.php");
   
 
                    $query = "SELECT * FROM roomupload";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                 
              
                  echo '<img src=' .@$row["image"].' height="300px" width="400px">' ;
                        }
                  }	
					
?>

 
<div class="title1">

<div class="type1">
 

                        
 </div></div>                                        
                    
                    






</div>
<?php include("footer.php"); ?>
</body>
</html>
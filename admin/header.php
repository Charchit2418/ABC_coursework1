<?php include("connect.php"); 
?>
<?php if (!isset($con)) {
       die("Database connection not established.");
   }
   ?>
   <?php
$sql="select title from home";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" />
<link href="css/menu.css" rel="stylesheet" />
<title>Untitled Document</title>
</head>

<body>
<?php

   
 $query = "SELECT image FROM logo";
                    $result1 = mysqli_query($con, $query);
                    
                    $row1 = mysqli_fetch_assoc($result1);

       ?>   
<div class="header">
<?php     echo '<img src=logoupload/' .$row1["image"].' height="120px" width="300px">'
                   ?>

                  
<?php echo @$row["title"];?>
</div>
<div class="low-header">

<div class="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="aboutus.php">About us</a></li>
<li><a href="contactus.php">Contact</a></li>
<li><a href="gallery.php">Accmomodation</a></li>


<li><a href="guest-login.php">Log In</a>
    
     
</ul>
</li>
</ul>
</div>
</div>
</div>
</body>
</html>
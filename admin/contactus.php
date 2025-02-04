<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include ("header.php") ;
?>
<?php include("admin/connect.php"); 
$sql="select contact from contact";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
<center>

<div id="contact">
<h1> CONTACT US</h1>
<?php echo $row["contact"];?>
</center>
</div>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php if (!isset($con)) {
	die("Database connection not established.");
}
?>
<?php include("header.php") ;
?>

<?php include("admin/connect.php"); 

$sql="select content from about";
$result=mysqli_query($con,$sql);
@$row = mysqli_fetch_assoc($result);
?>
<center>
<div id="about">
<h1> About Us </h1>
<p><?php echo $row["content"];?></p>
</div></center>
<?php include("footer.php")?>
</body>
</html>
<?php
	if(isset($_GET["id"]));
{
	include("connect.php");
	
	$id= $_GET["id"];
	$sql = "DELETE FROM employee_record WHERE id=$id";
	
	mysqli_query($con,$sql);
	
	echo mysqli_error($con);
	
	header("Location:employee-record.php"); exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
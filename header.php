<?php include("admin/connect.php"); ?>
<?php if (!isset($con)) {
	die("Database connection not established.");
}
?>
<?php
$sql="SELECT title FROM home";
$result=mysqli_query($con, $sql);
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
 $query = "SELECT image FROM logo WHERE id=5";
                    $result1 = mysqli_query($con,$query);
                    $row1 = mysqli_fetch_assoc($result1);

?>   
<div class="header">
<?php     echo '<img src=' ."https://static.vecteezy.com/system/resources/previews/023/815/737/non_2x/resort-logo-design-minimalist-concept-city-town-logo-design-template-vector.jpg".' height="120px" width="200px">';
                   ?>

                  
<?php echo @$row["title"];?>
</div>
</body>
</html>
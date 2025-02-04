<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php include("header.php"); ?>

<div class="main-content1">
<div class="bgc">
<div class="log">
<div class="fom">
<h3>Guest Login</h3>

<form action="" method="POST" >
	Username:<input type="text" name="username" />
    </br></br>
Password:<input type="password" name="pwd" />
    </br></br>
    <input type ="submit" name="login" value="Log In" /></br></br>
</form>
<a href="user-forget-password.php"><h2><span style='color:white'>forget password</h2></a></div></div>
<div class="sign-up">
<h4>Dont have account?<br />Register NOW</h4>
<a href="user-reg.php"><h3>CLICK HERE FOR REGISTER</h3></a>
</div></div>
<?php include("footer.php");?>
</body>
</html>


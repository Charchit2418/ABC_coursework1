<?php
if (!isset($_SERVER['HTTP_REFERER'])){

header("location:login.php"); }

                                          
?>
<?php
	include("connect.php");
	
	if(isset($_POST["edituser"])){
		$id = $_POST["userid"];
		$firstname = $_POST["fname"];
		$lastname = $_POST["lname"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		
		$gender = $_POST["gender"];
		$phone = $_POST["phone"];
		$sql = "UPDATE guest_record SET firstname='$firstname', lastname='$lastname',email='$email',username='$username',gender='$gender',phone='$phone' WHERE id=$id";
		
		mysqli_query($con,$sql);
		echo mysqli_error($con);
		
		header("Location: displayuser.php"); exit;
	}
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM guest_record WHERE id=$id";
	$result = mysqli_query($con,$sql);
	
	$data = mysqli_fetch_assoc($result);
?>
<?php include("dash.php");?>
<center>
<h3>User Edit</h3>

<form action="" method="post">
	<input type="hidden" name="userid" value="<?php echo $id;?>" />
	Firstname:<input type="text" name="fname" value="<?php echo $data["firstname"];?>" readonly />
    <br /><br />
    
    Lastname:<input type="text" name="lname" value="<?php echo $data["lastname"];?>" readonly />
    <br /><br />
     Email:<input type="text" name="email" value="<?php echo $data["email"];?>"  readonly />
    <br /><br />
     Username<input type="datetime"date name="username" value="<?php echo $data["username"];?>" readonly  />
    <br /><br />
     
     
    <input name="gender" type="radio" value="male"<?php if($data['gender']=="male"){ echo "checked";}?> readonly/>Male
<input name="gender" type="radio" value="female" <?php if($data['gender']=="female"){ echo "checked";}?> readonly/>Female<br/><br/><br/>
    
     Phone:<input type="text" name="phone" value="<?php echo $data["phone"];?>" readonly/>
    <br /><br />
    <input type="submit" name="edituser" value="Update" />
</form>
</center>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/menu.css" rel="stylesheet" />
</head>

<body>
<?php include("header.php"); 
include("admin/connect.php");

?>

<div class="display_details">

<table width="100%" border="1">
	<tr>
    	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Contact no</th>
        <th>DateOfReg</th>
        <th>Action</th>
    </tr>
    
<?php


if(isset($_POST["submit"])){
$phone=$_POST["contact"];
$answer=$_POST["answer"];


			 $sql ="SELECT *from guest_record where phone='$phone' and answer='$answer'";
			 
			 $result=mysqli_query($con,$sql);
	 echo mysqli_error($con);
	 if(mysqli_num_rows($result)>0)
		{
	while($row = mysqli_fetch_assoc($result)){
?>


 <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["firstname"];?></td>
            <td><?php echo $row["lastname"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["password"];?></td>
            <td><?php echo $row["gender"];?></td>
            <td><?php echo $row["phone"];?></td>
            <td><?php echo $row["date_of_reg"];?></td>
            <td>
            <a href="edit-user.php?id=<?php echo $row["id"];?>">Edit</a> <br />
             <a href="delete.php?id=<?php echo $row["id"];?>">Delete</a> 
            </td>
        </tr>
    
    
    


</table>

</div>
<?php }  } else{

echo "<span style='color:red'>invalid answer";
} }?>







</body>
</html>
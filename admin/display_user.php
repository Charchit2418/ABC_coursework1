<link  href="css/dashboard.css" rel="stylesheet" type="text/css"/>
 <link  href="css/login.css" rel="stylesheet" type="text/css"/>
<style>
    .header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
        }
</style>


<?php 
if (!isset($_SERVER['HTTP_REFERER'])){

   echo "direct acess is not alloweded"; }

else {
	?>
        <div class="header">
        <h2>Welcome to Admin Dashboard</h2>
    </div>
<?php
	include("connect.php");
include("dash.php");
?>

<div class="search">
<form action="" method="post">
	<h2>Firstname</h2><input type="text" name="firstname" />&nbsp;&nbsp;
    <input type="submit" name="search" value="Go" />
</form>
</div>

<div class="box">
<h3>User management</h3>
<table width="100%" border="1">
	<tr>
    	<th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Username</th>
         <th>Gender</th>
        <th>Contact no</th>
        <th>DateOfReg</th>
        <th>Action</th>
    </tr>
    
    <?php
		if(isset($_POST["search"])){
			$fname = $_POST["firstname"];
			$sql = "SELECT * FROM guest_record WHERE firstname LIKE '%$fname%'";
		}
		else{
			$sql = "SELECT * FROM guest_record";
		}
		
		$result = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_assoc($result)){
	?>
    
        <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["firstname"];?></td>
            <td><?php echo $row["lastname"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["username"];?></td>
         
            <td><?php echo $row["gender"];?></td>
            <td><?php echo $row["phone"];?></td>
            <td><?php echo $row["date_of_reg"];?></td>
            <td>
       
             <a href="delete.php?id=<?php echo $row["id"];?>"><button>Delete</button></a>
            </td>
        </tr>
    
    <?php }}?>
    
    
</table></div>

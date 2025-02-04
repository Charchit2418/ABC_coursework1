<?php
	include("connect.php");
?>

<h3>User management</h3>
<form action="" method="post">
	Firstname:<input type="text" name="firstname" />&nbsp;&nbsp;
    <input type="submit" name="search" value="Go" />
</form>


<?php include("../admin/dash.php");?>
<div class="box">
<table width="100%" border="1">
	<tr>
    	<th>Id</th>
        <th>Full_name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Type</th>
        <th>Price</th>
        <th>Phone</th>
        <th>Room no</th>
        <th>DateOfbooking</th>
        <th>no of das booked</th>
        <th>Action</th>
    </tr>
    
    <?php
		if(isset($_POST["search"])){
			$fname = $_POST["firstname"];
			$sql = "SELECT * FROM roombooked WHERE firstname LIKE '%$fname%'";
		}
		else{
			$sql = "SELECT * FROM roombooked";
		}
		
		$result = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_assoc($result)){
	?>
    
        <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["full_name"];?></td>
            <td><?php echo $row["username"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["type"];?></td>
            <td><?php echo $row["price"];?></td>
            <td><?php echo $row["phone"];?></td>
            
           <td><?php echo $row["room_no"];?></td>
 
            <td><?php echo $row["date"];?></td>
            <td><?php echo $row["no_of_daysbooking"];?></td>
            <td>
            <a href="../mamaproject/admin/edit-booking.php?id=<?php echo $row["id"];?>">Edit</a> 
             <a href="../mamaproject/admin/deletebooking.php?id=<?php echo $row["id"];?>">Delete</a> |
            </td>
        </tr>
    
    <?php }?>
    
    
</table></div>
<p><a href="../mamaproject/admin/userinsert.php">New user</a></p>>
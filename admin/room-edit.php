<?php
if (!isset($_SERVER['HTTP_REFERER'])){

header("location:login.php"); }

                                          
?>
<?php session_start();
    if(!isset($_SESSION["admin"]))
    {
        
    }
?>
<style>
    .header {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 22px;
        }
</style>
    <div class="header">
        <h2>Welcome to Admin Dashboard</h2>
    </div>
<div class="box">

                    <table width="100%" border="1%">
                        <tr>
                            <td>Id</td>
                            <td>ROOM-NO</td>
                            
                            <td>Price</td>
                            <td>Types</td>
                           
                            <td>Status</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                        
                        <?php
                        include("connect.php");
   
 include("dash.php");
                    $query = "SELECT * FROM roomupload";
                    $result = mysqli_query($con,$query);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                 
                  
              
					
?>

                       <tr>
                            <td><?php echo $row["id"] ?></td>
                            
                            <td><?php echo $row["room_no"] ?></td>
                           <td><?php echo $row["price"] ?></td>
                           <td><?php echo $row["type"] ?></td>
                           
                            <td><?php echo $row["status"]?></td>
                          
                             <td> <?php echo '<img src='.$row["image"].' height="60px" width="60px">'?></td>
                        <td><a href="room-edit1.php?id=<?php echo $row["id"]?>"><button>Edit</button></a> &nbsp; <a href="room-delete.php?id=<?php echo $row["id"] ?>"><button>Delete</button></a></td>
                        </tr>
                       <?php }}?>
                    </table>
                    <h3>Accomondaton Management</h3>
                    <a href="roomupload.php"><button>New Room</button></a>
</div>
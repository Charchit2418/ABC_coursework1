<?php
if (!isset($_SERVER['HTTP_REFERER'])){

header("location:login.php"); }

                                          
?>
<link href="css/login.css" rel="stylesheet" />

<?php session_start();
	include("connect.php");
include("dash.php");
   

if(isset($_POST["go"]))
{
    
	$image = $_FILES["logo_image"]["name"];
    
	move_uploaded_file($_FILES["logo_image"]["tmp_name"], 'logoupload/' . $_FILES["logo_image"]["name"]);

    $query="update logo set image='$image' where id=5;";
    
    $result =mysqli_query($con,$query);
    echo mysqli_error($con);
    header("location:logoupload1.php");
	exit;

    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<center>
<div class="season">
 <form action="" method="post" enctype="multipart/form-data">
                        
                                
                              <h3>chooselogo</h3><input type="file" name="logo_image"/>
                                <input type="submit" name="go" value="go" />
                                
                                </form>



</div>
</center>


</body>
</html>
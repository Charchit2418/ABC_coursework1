<?php
include("header.php");
include("admin/connect.php");
?>
<?php




 if(isset($_POST['submit']) && $_POST['submit'] = "submit")
    {
echo $id;
@$id= $_SESSION['user_id'] ;
 
	 

        $password = ($_POST['password']);
        $newpassword = ($_POST['newpassword']);
        $confirmnewpassword =($_POST['confirmnewpassword']);

        $result = mysqli_query($con,"SELECT password FROM guest_record WHERE id=$id");

           
            
            if($password != mysqli_result($result))
            {
                echo "Entered an incorrect password";
            }

            if($newpassword == $confirmnewpassword)
            {
                $sql = mysqli_query($con,"UPDATE guest_record SET password='$newpassword' WHERE id = $id");      
           
                echo "Congratulations, password successfully changed!";
            }
            else
            {
                echo "New password and confirm password must be the same!";
            }
        }     
    ?>


    <form name="newprwd" action="" method="post">
    
    Password :<input type="password" name="password" value=""><br>
    New Password :<input type="password" name="newpassword" value=""><br>
    Confirm Password :<input type="password" name="confirmnewpassword" value=""><br>
    <input type="submit" name="submit" value="submit"><br>
    </form>
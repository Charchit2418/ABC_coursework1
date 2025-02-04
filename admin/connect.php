<?php
$servername="localhost";
$username="root";
$password="";
$dbname="charchit_project";

 $con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con){
echo"error in database connection";
}
else{
echo"";
echo"</br>";
}





?>

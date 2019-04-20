<?php
// include php connectio file name
// start the session

include('connection.php');
session_start();
$query="INSERT INTO `signup`(`user`, `first`, `last`, `pass`, `city`, `phone`) VALUES ('".$_POST["uname"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["pass"]."','".$_POST["city"]."','".$_POST["phone"]."');";
$result=mysqli_query($conn,$query);
if($result)
{
    $message =true;
}
else
{
    $message=false;
}
echo $message;
?>
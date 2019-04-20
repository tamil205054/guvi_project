<?php
include('connection.php');
session_start();
$user=$_POST["email"];
$pass=$_POST["password"]; 
$query="SELECT * FROM `signup` WHERE `user`='".$user."' and `pass`='".$pass."';";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result)or die("error");
if($num)
{
    $mesg= true;
    $_SESSION['username']=$user; 
    $_SESSION['userpass']=$pass;  
}
else
{
    $mesg= false;
}
echo $mesg;
?>
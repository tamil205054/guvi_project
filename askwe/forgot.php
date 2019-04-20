<?php
session_start();
include ('connection.php');
if(isset($_POST['user']))
{
            $query="UPDATE `signup` SET  `pass`='".$_POST["pass"]."' WHERE `user`='".$_POST["user"]."' and `phone`='".$_POST['phone']."';";
            $result=mysqli_query($conn,$query);
    if($result)
    {
     session_destroy();
     echo 'password updated';   
    }
}
?>
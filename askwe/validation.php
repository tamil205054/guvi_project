<?php
session_start();
include('connection.php');
if(isset($_POST['name']))
{
    $msg='';
    $query="SELECT * FROM `signup` WHERE `user`='".$_POST['name']."';";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==0)
    {
        $msg="success";
    } 
    echo $msg;
    
}
?>
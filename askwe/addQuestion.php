<?php
// start the session
// include the connection.php file
session_start();
include("connection.php");
if(isset($_POST["msg"]))
{
    $message=" ";
    $query="INSERT INTO `questions`( `question`, `userid`, `answer_count`) VALUES ('".$_POST["msg"]."','".$_SESSION['username']."',0);";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        $message="success";
    }
 
    echo $message;
}
?>
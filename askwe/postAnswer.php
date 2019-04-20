<?php
// post the answer to database
// include connection file
// start the session 
include('connection.php');
session_start();
if(isset($_POST["user"]))
{
    // get the value from user
$msg="0";
$user=$_POST["user"];
$url=$_POST["url"]; 
$language=$_POST["lang"];
$question_id=$_POST["q_id"];
$count=0;
$query="SELECT * FROM `questions` WHERE `question_id`='".$question_id."';";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)==1)
{
    
    while($row=mysqli_fetch_array($result))
    {
        $count=$row["answer_count"];
    }
}
$checkUser="SELECT * FROM `answer` WHERE  `question_id`='".$question_id."' AND `user_name`='".$user."';";
$fetch=mysqli_query($conn,$checkUser);
if(mysqli_num_rows($fetch)==0)
{
$addAns="INSERT INTO `answer`(`question_id`, `user_name`,`userid`, `url`, `lang`)VALUES ('".$question_id."','".$user."','".$_SESSION['username']."','".$url."','".$language."');";
$result1=mysqli_query($conn,$addAns)or die("error");
if($result1)
{
    // update the answer count in question  answer_count
    $count=$count+1;
    $update="UPDATE `questions` SET `answer_count`='".$count."' WHERE `question_id`='".$question_id."';";
    $result2=mysqli_query($conn,$update);
    if($result2)
    {
        $msg="Successfully Add the Answer";
    }
}
}
else
{
    $up="UPDATE `answer` SET    `url`='".$url."',`lang`='".$language."' WHERE `user_name`='".$user."';";
    $push=mysqli_query($conn,$up);
    if($push)
    {
        $msg="Successfully Update ";
    }
}

echo $msg;
}
?>
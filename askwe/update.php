<?php
// update the user details 
session_start();
include 'connection.php';
if(isset($_POST['email']))
{
	$ch="SELECT * FROM `personal_details` WHERE `username`='".$_POST['email']."';";
	$ch1=mysqli_query($conn,$ch);
	if(mysqli_num_rows($ch1)==0)
	{
	$query="INSERT INTO `personal_details`(`username`, `gender`, `state`) VALUES ('".$_POST['email']."','".$_POST['gender']."','".$_POST['state']."');";
	$result=mysqli_query($conn,$query);
	}
	else
	{
	$de="	UPDATE `personal_details` SET `username`='".$_POST['email']."',`gender`='".$_POST['gender']."',`state`= '".$_POST['state']."' WHERE `username`='".$_POST['email']."';";
	$result2=mysqli_query($conn,$de);
	}
	$query1="UPDATE `signup` SET `city`='".$_POST['city']."',`phone`='".$_POST['phone']."'  WHERE `id`='".$_POST['id']."';";
	$result1=mysqli_query($conn,$query1);
	if($result1)
	{
		echo "successfully update the details:";
	}
}
else
{
	echo "fill details";
} 
?>
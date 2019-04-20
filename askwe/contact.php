<?php
session_start();
include 'connection.php';
if(isset($_POST['id']))
{
	$ch="SELECT * FROM `contect` WHERE `username`='".$_POST['id']."';";
	$ch1=mysqli_query($conn,$ch);
	if(mysqli_num_rows($ch1)==0)
	{
	$query="INSERT INTO `contect`(`username`, `githup`, `whatsapp`, `facebook`, `twitter`, `linkedlin`, `instagram`) VALUES ('".$_POST['id']."','".$_POST['git']."','".$_POST['whatsapp']."','".$_POST['fb']."','".$_POST['tweeter']."','".$_POST['linkedlin']."','".$_POST['instagram']."');";
	$result=mysqli_query($conn,$query);
	echo "succussfully added details";
	}
	else
	{
		$query1="UPDATE `contect` SET `githup`='".$_POST['git']."',`whatsapp`='".$_POST['whatsapp']."',`facebook`='".$_POST['fb']."',`twitter`='".$_POST['tweeter']."',`linkedlin`='".$_POST['linkedlin']."',`instagram`='".$_POST['instagram']."' WHERE `username`= '".$_POST['id']."';";
		$result1=mysqli_query($conn,$query1);
		echo "succussfully update the details";
	}
}
else
{
	echo $error;
} 
?>
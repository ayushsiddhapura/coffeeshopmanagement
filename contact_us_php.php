<?php

  include "connection.php";


  if(!isset($_POST['submit']))
  {
  	header("location:index.php");

  }
  else
  {

  	$name = $_POST['name'];
  	$email = $_POST['email'];
  	$number = $_POST['number'];
  	$subject = $_POST['subject'];
  	$msg = $_POST['msg'];


  	$err=0;
  	$suc=0;


  	$q = "INSERT INTO tbl_contact (contact_name,contact_email,contact_phone,contact_subject,contact_msg,contact_status) 
  	      VALUES('$name','$email','$number','$subject','$msg','1') ";
  	$r = mysqli_query($con,$q);

  	if(!$r)
  	{	
  		$err++;
  		header("location:contact_us.php?err=".$err);

  	}
  	else
  	{
  		$suc++;
  		header("location:contact_us.php?suc=".$suc);
  	}


  }

?>


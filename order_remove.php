<?php

  session_start();
  
  include "connection.php";


  	 if( !isset($_SESSION['order'])  )
    {
    	header("location:index.php");
    }

    else
    {
    	$t_id = $_SESSION['order'];

    	$product_id = $_GET['product_id'];

    	echo "<br>".$product_id;

    	$q = "UPDATE tbl_order SET order_done='1' WHERE product_id='$product_id' AND table_id='$t_id' AND order_status='0' AND order_done='0' AND order_repeat='0' ";
    	$r = mysqli_query($con,$q);

    	if( mysqli_affected_rows($con) )
    	{
    		header("location:cart.php");
    	}
    	else
    	{
    		header("location:cart.php");
    	}

    }


   
?>

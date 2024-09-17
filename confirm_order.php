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

    	if(!isset($_POST['submit']))
    	{
    		header("location:index.php");
    	}

    	else
    	{
    	   
    	   $product_id = $_POST['p_id'];

    	   $quant = $_POST['quantity'];

    	   $count1 = count($product_id);
    	   $count2 = count($quant);
    	   $p;
    	   $qont;
    	   $i;
    	   $j=0;
    	   $a=0;
    	   $b=0;
    	   $c=0;

    	   for($i=0;$i<$count1;$i++)
    	   {
    	   		$p = $product_id[$i];
    	   		echo "<br>p_id : ".$p;

    	   		for($j=$i;$j<=$i;$j++)
    	   		{
    	   			$qont = $quant[$j];
    	   			echo "<br>Q : ".$qont;
    	   		}


    	   		$q1 = "SELECT * FROM tbl_order WHERE product_id='$p' AND table_id='$t_id' AND order_status='1' AND order_done='0' AND order_repeat='0' ";
    		 	$r1 = mysqli_query($con,$q1);
    		 	$n1 = mysqli_num_rows($r1);

    		 	if($n1>0)
    		 	{

    		 		while ( $s1 = mysqli_fetch_array($r1) )
		    		{
		    	   	  	$oq	= $s1['order_quant'];
		    	   	  	$o_id = $s1['order_id'];

		    	   	  	$fq = (int)$oq + (int)$qont;

		    	   	  	$q = "UPDATE tbl_order SET order_quant='$fq' WHERE order_id='$o_id' ";
					    $s = mysqli_query($con,$q);

					    if(!mysqli_affected_rows($con))
					    {
					    	$a++;
					    }
					    else
					    {

					    }

					    $q2 = "UPDATE tbl_order SET order_repeat='1' WHERE product_id='$p' AND table_id='$t_id' AND order_status='0' AND order_done='0' AND order_repeat='0' ";
					    $s2 = mysqli_query($con,$q2);

					    if(!mysqli_affected_rows($con))
						{
							$b++;
					     	
						}
						else
						{

						}
					

		    	   }


    		 	}
    		 	else
    		 	{
    		 		   $q2 = "UPDATE tbl_order SET order_quant='$qont',order_status='1' WHERE table_id='$t_id' AND product_id='$p' AND order_status='0' AND order_done='0' AND order_repeat='0' ";
					   $s2 = mysqli_query($con,$q2);

					    if(!mysqli_affected_rows($con))
						{
							$c++;
					     	
						}
						else
						{

						}

    		 	}


    	   }

    	   if($a>0 || $b>0 || $c>0)
    	   {
    	   	 echo "Error in Any of the Three Query";
    	   }
    	   else
    	   {
    	   		header("location:bill.php");
    	   }


    	}

    }


?>
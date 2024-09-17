<?php

	session_start();

	include "connection.php";


	if(!isset($_POST['submit']))
	{
		header("location:index.php");

	}
	else
	{
		$itm=0;
		if(!isset($_POST['item']))
		{
			$itm++;
			header("location:shop.php?itm=".$itm);
		}
		else
		{
			$item = $_POST['item'];	

		$table_id = $_POST['table_id'];

		$c1 = 0;
		$suc=0;
		$err=0;

		if(is_array($item))
    	{
    		foreach ($item as $key) 
			{
						
				$q2 = "SELECT * FROM tbl_order WHERE table_id='$table_id' AND product_id='$key' AND order_status='0' AND order_done='0'";
				$r2 = mysqli_query($con,$q2);
				$n = mysqli_num_rows($r2);
				$s2 = mysqli_fetch_array($r2);

				if($n==1)
				{	
					$fq = (int)$s2['order_quant']+1;

					$q = "UPDATE tbl_order SET order_quant='$fq' WHERE table_id='$table_id' AND product_id='$key' AND order_status='0' AND order_done='0' ";

					$s = mysqli_query($con,$q);

					if(mysqli_affected_rows($con))
					{	
						$c1++;
					}

				}

				else
				{

					
						$q = "INSERT INTO tbl_order(table_id,product_id,order_status,order_quant,order_done) VALUES('$table_id','$key','0','1','0')";
						$s = mysqli_query($con,$q);
				
						if(!$s)	
						{
			    			$err++;
			    			
			    		}
			    		else
			    		{
			    			$suc++;
			    					    			
			    		}	
		

				}
						

			}

			if($err!=0)
			{	
				header("location:shop.php?err=".$err);
			}
			if($suc!=0 || $c1!=0)
			{	
				session_start();
		    	$_SESSION['order'] = $table_id;
		    	$_SESSION['cart'] = $table_id;
		    	
				header("location:cart.php?table_id=".$table_id);
			}
	    	
	    }

	    else
	    {
	    	echo "<br>Not a Array";
	    }


	   }

	}


?>
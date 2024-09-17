<?php

	session_start();

	include 'connection.php';

	$p_id = 6;

	if( !isset($_SESSION['order'])  )
    {
      echo "<script>alert('if');</script>";
    	header("location:index.php");

    }

    else
    {

      $t_id = $_SESSION['order'] ;

      $q = "SELECT * FROM tbl_order WHERE table_id='$t_id' AND order_status='1' AND order_done='0'  ";
      $r = mysqli_query($con,$q);
     
      $n = mysqli_num_rows($r);

      if($n==0)
      {
        echo "<script>alert('else');</script>";
      	header("location:index.php");
      }

      else
      {


?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <?php include "head.php";  ?>

  </head>

  <body>
  	 <!--  header (topbar)   -->
      <?php  include "header.php"; ?>

      <!-- end of header(topbar) -->


           <!--  Slider Section -->
     <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url('photos/cafe6.jpg');" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">Bill</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Bill</span></p>
                      </div>

                    </div>
                  </div>
                </div>

 
    </section>
    <!-- End of Slider Section -->

  

    <section class="ftco-section ftco-cart">
      <div class="container">
      
      		<div class="cart-list">
      		<div class="row justify-content-center">
    			<div class="col col-lg-10 col-md-10 mt-10 cart-wrap ftco-animate">
    				<div class="cart-total mb-3" style="width:150%" >
    					<h3>Cart Totals</h3>

    					<?php

    						$total = 0;

    						echo '<p class="d-flex">
		    						<span>Item</span>
		    						
		    						<span>Price</span>
		    						<span>Quantity</span>
		    						<span>Total Price</span>
		    					</p>';
    						
    						while( $s = mysqli_fetch_array($r) )
    						{
    							$sub = 0;
    							$p_id = $s['product_id'];

    							$q1 = "SELECT * FROM tbl_product WHERE product_id='$p_id' ";
    							$r1 = mysqli_query($con,$q1);

    							while( $s1 = mysqli_fetch_array($r1) )
    							{
    								$sub = (int)$s['order_quant'] * (int)$s1['product_price'];

    								echo '<p class="d-flex">
				    						<span>'.$s1['product_name'].'</span>
				    						
				    						<span>Rs. '.$s1['product_price'].'</span>
				    						<span>'.$s['order_quant'].'</span>
				    						<span>Rs. '.$sub.'</span>
	    						   		 </p>';

    							}

    							$total = $total + $sub;

    						}


    					?>

					
    					<!-- <p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>  -->

    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rs. <?php echo $total; ?></span>
    					</p>
    				</div>
    				
    			</div>
    		</div>
    	</div>



	  </div>
	</section>


     <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
  
    
  </body>
</html>


<?php
    
    }

   }

?>
<?php

	session_start();
	include "connection.php";

   $p_id = '2';

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
              <div class="slider-item" style="background-image: url(photos/cafe3.jpg);" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
                      </div>

                    </div>
                  </div>
                </div>
 
    </section>
    <!-- End of Slider Section -->


<!-- Showing Menu   -->
    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        
        	<?php    

        		$q1 = "SELECT * FROM tbl_category WHERE cat_status='1' ORDER BY cat_id ASC ";
        		$s1 = mysqli_query($con,$q1);

        		while( $r1=mysqli_fetch_array($s1) )
        		{

        			echo '<div class="col-md-6 mb-5 pb-3">';
        			echo '<img height="70px" width="85px" class="" alt="User Image" src="'.$r1['cat_image'].'"  >';
        			echo '<h3 class="mb-5 heading-pricing ftco-animate" >'.$r1['cat_name'].' </h3>';
        			

        			


        			$q2 = "SELECT * FROM tbl_product WHERE product_status='1' AND cat_id=".$r1['cat_id'] ;
        			$s2 = mysqli_query($con,$q2);

        			while( $r2 = mysqli_fetch_array($s2) )
        			{

        				echo '<div class="pricing-entry d-flex ftco-animate">
			        			
			        			<div class="desc pl-3">
				        			<div class="d-flex text align-items-center">
				        				<h3><span>'.$r2['product_name'].'</span></h3>
				        				<span class="price">Rs. '.$r2['product_price'].'</span>
				        			</div>
				        			<div class="d-block">
				        				<p>'.$r2['product_description'].'</p>
				        			</div>
			        			</div>
			        		</div>';



        			}

        			echo '</div>';

        		}

        		echo '</div>';

        	?>
  


        </div>
    	</div>
    </section>


   

   
    <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
  </body>
</html>
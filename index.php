<?php

	session_start();

	include "connection.php";

  $p_id = '1';

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

      <?php

        $q7 = "SELECT * FROM tbl_slider WHERE s_status='1' ORDER BY s_id DESC";
        $s7 = mysqli_query($con,$q7);
        $count7 = 0;

        while( $r7 = mysqli_fetch_array($s7) )
        {
            $count7++;

            if($count7<=3)
            {
              echo '<div class="slider-item" style="background-image: url('.$r7['s_location'].');">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                      <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">'.$r7['s_name'].'</span>
                        <h1 class="mb-4">'.$r7['s_caption'].'</h1>
                        <p class="mb-4 mb-md-5">'.$r7['s_description'].'</p>
                        <p><a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
                      </div>

                    </div>
                  </div>
                </div>';

            }
            else
            {
              break;
            }

        }

      ?>

    </section></br></br>
    <!-- End of Slider Section -->


    <!--  Our Story Section -->
   <?php  include "about_us_content.php";  ?>
    <!--  End of Our Story Section -->

    
    <!--  Discover Our Menu Section -->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6 pr-md-5">
    				<div class="heading-section text-md-right ftco-animate">
	          	<span class="subheading">Discover</span>
	            <h2 class="mb-4">Our Menu</h2>
	            <p class="mb-4">Black Bird's Café has a varied selection of foods and drinks. It is a place where people who cook with love and a spirit of adventure prepare different cuisines.Our ingredients are chosen with care, we try our best to buy local, and stay away from using artificial colourants and preservatives.
Summer days come and enjoy refreshing and energizing fresh juices with light food. Winter evenings are a treat in the Café balcony, with a cozy fire to compliment the seasonal food.</p>
	            <p><a href="menu.php" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
             

              <?php  
                    $count1 = 0;
                  $q1 = "SELECT * FROM tbl_category WHERE cat_status='1' ORDER BY cat_id ASC ";
                  $s1 = mysqli_query($con,$q1);

                  while( $r1 = mysqli_fetch_array($s1) )
                  {
                    $count1++;

                    if($count1%2==0)
                    {   
                        echo '<div class="col-md-6">';
                        echo '<div class="menu-entry">';
                       // echo '<a href="#" class="img" style="background-image: url('.$r1['cat_image'].');"></a>';
                        echo '<img  class="img" alt="User Image" src="'.$r1['cat_image'].'"  >';

                        echo '</div>' ;
                        echo '</div>';
                    }
                    else
                    {   
                        echo '<div class="col-md-6">';
                        echo '<div class="menu-entry">';
                       // echo '<a href="#" class="img" style="background-image: url('.$r1['cat_image'].');"></a>';
                        echo '<img  class="img" alt="User Image" src="'.$r1['cat_image'].'"  >';

                        echo '</div>' ;
                        echo '</div>' ;
                    }

                  }
               ?>

    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!--  End of Discover Our Menu Section  -->


   
    <!--  Bet Seller Section -->
    <section class="ftco-section">
    	<div class="container">

    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Best Sellers</h2>
            <p>We deliever good quality food with great service to our customers.Here, we are displaying our some best items of this cafe.</p>
          </div>
        </div>

        <div class="row">

          <?php    

            $q2 = "SELECT * FROM tbl_bestseller WHERE b_status='1' ORDER BY b_id DESC ";
            $s2 = mysqli_query($con,$q2);
            $count2 = 0;

            while( $r2 = mysqli_fetch_array($s2) )
            {
              $count2++;

              if($count2<=4)
              { 
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo '<a href="#" class="img" style="background-image: url('.$r2['b_image'].');"></a>';
                  echo '<div class="text text-center pt-4">';
                  echo '<h3><a href="#">'.$r2['b_name'].'</a></h3>';
                  echo '<p>'.$r2['b_description'].'</p>';
                 // echo '<p class="price"><span>$5.90</span></p>';
                 // echo '<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }
              else
              {
                break;
              }
             
            }

          ?>


        </div>
    	</div>
    </section>
    <!-- End of Best Seller Section -->


    <!-- Photo Gallery Section  -->
    <!--<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">-->
			<section class="ftco-section">
    	<div class="container">

    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Events</h2>
            <p>In this cafe we are also organize events like Birthday party,farewell party ,freshers party and Anivaysary.</p>
          </div>
        </div>
			
        <div class="row">

          <?php    

            $q3 = "SELECT * FROM tbl_photo WHERE p_status='1' ORDER BY p_id DESC ";
            $s3 = mysqli_query($con,$q3);
            $count3 = 0;

            while( $r3 = mysqli_fetch_array($s3) )
            {
              $count3++;

              if($count3<=4)
              { 
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                //  echo '<a href="#" class="img" style="background-image: url('.$r3['b_image'].');"></a>';
                  echo '<img  class="img" alt="User Image" src="'.$r3['p_location'].'"  >';
                  echo '<div class="text text-center pt-4">';
                  echo '<h3><a href="#">'.$r3['p_caption'].'</a></h3>';
                  echo '<p>'.$r3['p_description'].'</p>';
                 // echo '<p class="price"><span>$5.90</span></p>';
                 // echo '<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }
              else
              {
                break;
              }
             
            }

          ?>


        </div>

        </div>
    	</div>
    </section> <br><br>
    <!-- End of Photo Gallery Section -->


    



		<!--  Map  -->
		<section class="ftco-appointment" >
			<div class="overlay" ></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-12 d-flex align-self-stretch" >
    		
    		<!--  to change the location of map . go to js/google-map.js.. and change the x-y -->
    		<div class="map" id="map">
	      		<div class="size-303" id="google_map"  data-pin="images/loc.png" ></div>
    	     </div>  

    			</div>   

    			<!-- Map -->
   				<div class="map">
				<div class="size-303" id="google_map" mapTypeId='satellite' data-map-x="23.0616933" data-map-y="72.6680435" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
			</div> 

			
 
        </div>
    	</div>
    </section>
    <!-- End Of Map-->


    <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
  

    
  </body>
</html>
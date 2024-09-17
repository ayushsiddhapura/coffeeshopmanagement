<?php

	session_start();

	include "connection.php";

	  $p_id = '4';

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

      <div class="slider-item" style="background-image: url('photos/cafe7.jpg');" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">About Us</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>About Us</span></p>
                      </div>

                    </div>
                  </div>
                </div>

 
    </section>
    <!-- End of Slider Section -->

    <?php 


        $q8 = "SELECT * FROM tbl_photo WHERE p_status='1' AND p_id='1' ";
        $s8 = mysqli_query($con,$q8);
        $r8 = mysqli_fetch_array($s8);


    ?>


    <!--  Our Story Section -->
   <?php  include "about_us_content.php";  ?>
    <!--  End of Our Story Section -->
   

    

     <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
    
  

  
    
  </body>
</html>
<?php

	session_start();
  include "connection.php";

  $p_id = '7';

	include("simple-php-captcha.php");
	$_SESSION['captcha'] = simple_php_captcha();


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

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url('photos/cafe5.jpg');" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">Contact Us</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact Us</span></p>
                      </div>

                    </div>
                  </div>
                </div>

 
    </section>

    <?php   

        $q = "SELECT * FROM tbl_cafe_detail ";
        $r = mysqli_query($con,$q);
        $s = mysqli_fetch_array($r);


     ?>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">

					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Contact Information</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Address : </span> <?php echo $s['cafe_address']; ?> </p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone : </span> <a href="tel://<?php echo $s['cafe_number']; ?>"> <?php echo $s['cafe_number']; ?> </a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email : </span> <a href="mailto:<?php echo $s['cafe_email']; ?>"><?php echo $s['cafe_email']; ?></a></p>
	            </div>
	           <!-- <div class="col-md-12 mb-3">
	              <p><span>Website:</span> <a href="#">yoursite.com</a></p>
	            </div>  -->
						</div>
					</div>

					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="contact_us_php.php" method="post" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" name="name" class="form-control" placeholder="Your Name">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="email" name="email" class="form-control" placeholder="Your Email">
	                </div>
	                </div>
              </div>
               <div class="form-group">
                <input type="text" name="number" class="form-control" placeholder="Your Mobile Number">
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="msg" id="" cols="7" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
                  <p>
			        <?php
			        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" height="50px" width="100px">';

			        ?>
			    </p>
                <div class="form-group">
                <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha Here">
              </div>
            <div id="bt">
              <div class="form-group">
                <input type="submit" name="submit" value="Fill all Details" class="btn btn-primary py-3 px-5" disabled>
              </div>
          </div>
            </form>
          </div>

        </div>
      </div>
    </section>

    <div id="map">

    				<div class="map">
				<div class="size-303" id="google_map" mapTypeId='satellite' data-map-x="23.07277" data-map-y="72.55572" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
			</div>

    </div>

    <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
    

<script>
$(document).ready(function(){
	
  $("#captcha").keyup(function(){
 
    		var captcha = $(this).val();
		   
    		var code = "<?php echo $_SESSION['captcha']['code'] ?>";
		       
		        if(captcha==code)
		        {	
		            document.getElementById("bt").innerHTML = '<div class="form-group"><input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5" ></div>';      
		        }
		        else
		        {
		             document.getElementById("bt").innerHTML = 	'<div class="form-group"><input type="submit" name="submit" value="Fill all Details" class="btn btn-primary py-3 px-5" disabled></div>';	                   
		        }  


  });

});
</script>



  </body>
</html>


<?php

       if( isset($_GET['err']) || isset($_GET['suc']) )
       {
        
           if(isset($_GET['err']) && ($_GET['err'])!=0 )
           {
              echo "<script> alert('Error in Sending Message..') </script>";
           }

           if(isset($_GET['suc']) && ($_GET['suc'])!=0 )
           {
              echo "<script> alert('Message Sent successfully..') </script>";
           }
     
       }


?>
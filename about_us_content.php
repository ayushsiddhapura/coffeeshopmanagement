 <?php 


        $q8 = "SELECT * FROM tbl_cafe_detail ";
        $s8 = mysqli_query($con,$q8);
        $r8 = mysqli_fetch_array($s8);


    ?>


    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(<?php echo $r8['cafe_image']; ?>);"></div>
    	
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Discover</span>
	          <h2 class="mb-4">Our Story</h2>
	        </div>
	        <div>
	  				<p><?php echo $r8['cafe_description']; ?>.</p>
	  			</div>
  			</div>
    	</div>
    </section>
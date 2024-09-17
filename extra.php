 <!--   Our Products (Drinks, Maggie etc ( Food Category)) -->
		<section class="ftco-menu">
    	<div class="container">

    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>


    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">


		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                  <?php   

                    $q4 = "SELECT * FROM tbl_category WHERE cat_status='1' ORDER BY cat_id ASC";
                    $s4 = mysqli_query($con,$q4);
                    $count4 = 0;

                    while( $r4 = mysqli_fetch_array($s4) )
                    {
                        $count4++;

                        if($count4==1)
                        {
                          echo '<a class="nav-link active" id="v-pills-'.$r4['cat_id'].'-tab" data-toggle="pill" href="#v-pills-'.$r4['cat_id'].'" role="tab" aria-controls="v-pills-'.$r4['cat_id'].'" aria-selected="true">'.$r4['cat_name'].'</a>';
                        }
                        else
                        {
                          echo '<a class="nav-link" id="v-pills-'.$r4['cat_id'].'-tab" data-toggle="pill" href="#v-pills-'.$r4['cat_id'].'" role="tab" aria-controls="v-pills-'.$r4['cat_id'].'" aria-selected="false">'.$r4['cat_name'].'</a>';
                        }
                    }

                  ?>
      
		            </div>
		          </div>


		          <div class="col-md-12 d-flex align-items-center">    
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                    
                    <!--  Category wise Product Images and Description.  -->

                    <?php  

                      $q5 = "SELECT * FROM tbl_category WHERE cat_status='1' ORDER BY cat_id ASC";
                      $s5 = mysqli_query($con,$q5);
                      $count5 = 0;

                      while( $r5 = mysqli_fetch_array($s5) )
                      { 
                        $count5++;

                        if($count5==1)
                        { 
                          echo '<div class="tab-pane fade show active" id="v-pills-'.$r5['cat_id'].'" role="tabpanel" aria-labelledby="v-pills-'.$r5['cat_id'].'-tab" >';
                          echo '<div class="row" >';

                        }
                        else
                        {
                          
                          echo '<div class="tab-pane fade" id="v-pills-'.$r5['cat_id'].'" role="tabpanel" aria-labelledby="v-pills-'.$r5['cat_id'].'-tab">';
                          echo '<div class="row">';
                        }

                        

                        $q6 = "SELECT * FROM tbl_product WHERE product_status='1' AND cat_id=".$r5['cat_id'];
                        $s6 = mysqli_query($con,$q6);

                        while( $r6 = mysqli_fetch_array($s6) )
                        {
                          echo '<div class="col-md-4 text-center" >';
                          echo '<div class="menu-wrap" >';
                          echo '<a href="#" class="menu-img img mb-4" style="background-image: url('.$r6['product_image'].'); "></a>';
                          echo '<div class="text">';
                          echo '<h3><a href="#">'.$r6['product_name'].'</a></h3>';
                          echo '<p>'.$r6['product_description'].'</p>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';

                        }

                        echo '</div>';
                        echo '</div>';

                      }


                    ?>

		            </div>
		          </div>
          
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
    <!--  End of Our Products (Drinks, Maggie etc ( Food Category))  -->
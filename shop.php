<?php

  	session_start();
	include "connection.php";

	 $p_id = '3';

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

        $q7 = "SELECT * FROM tbl_photo WHERE p_status='1' ORDER BY p_id DESC";
        $s7 = mysqli_query($con,$q7);
        $count7 = 0;

        while( $r7 = mysqli_fetch_array($s7) )
        {
            $count7++;

            if($count7==4)
            {
              echo '<div class="slider-item" style="background-image: url('.$r7['p_location'].');" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">Order Now</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Order</span></p>
                      </div>

                    </div>
                  </div>
                </div>';

            }
            elseif($count7>4)
            {
              break;
            }

        }

      ?>

 
    </section>
    <!-- End of Slider Section -->




    <!-- Showing Menu (Select food item from the Menu)  -->
    <section class="ftco-section">

    	<form method="post" action="order_php.php" >


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

				        				<input type="checkbox" name="item[]" value="'.$r2['product_id'].'" >

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

    <!--		<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">Apply coupon</div>

	-->
				<div  class="row justify-content-center" >
                    <select name="table_id" class="btn py-3 px-4 btn-primary" style="border-radius: 10px" required="">
                    	<option value disabled selected>Select Table Name</option>

                    	<?php

                    		$q = "SELECT * FROM tbl_table WHERE table_status='1' ";
                    		$s = mysqli_query($con,$q);

                    		while( $r = mysqli_fetch_array($s) )
                    		{
                          
                          if(isset($_SESSION['cart']))
                          {

                            $t_id = $_SESSION['cart'];
                            
                            if($r['table_id']==$t_id)
                            {
                                echo '<option selected value="'.$r['table_id'].'" >'.$r['table_name'].'</option>';    
                            }
                            else
                            {

                            }

                          }
                          else
                          {

                            echo '<option value="'.$r['table_id'].'" >'.$r['table_name'].'</option>';
                          }
                    			

                    		}


                    	?>


                    </select>
                  </div>    <br>			

 				<div  class="row justify-content-center" >
                    <input type="submit" name="submit" value="ADD" class="btn py-3 px-4 btn-primary" >
                  </div>
        </form>

    </section>


<!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  

 
  
    
  </body>
</html>


<?php

     if( isset($_GET['err']) || isset($_GET['suc']) || isset($_GET['itm']) )
    {

      	   if(isset($_GET['err']) && ($_GET['err'])!=0 )
           {
              echo "<script> alert('Error in Adding Food Item to Cart..') </script>";
           }

           if(isset($_GET['suc']) && ($_GET['suc'])!=0 )
           {
              echo "<script> alert(' Food items added successfully..') </script>";
           }
           if(isset($_GET['itm']) && ($_GET['itm'])!=0 )
           {
              echo "<script> alert('Please Select Food items..') </script>";
           }
                    
    }


?>
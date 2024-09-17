<?php

  session_start();
  
  include "connection.php";

  $p_id = 5;
   
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

        $x=0;
        $y=0;

        while( $r7 = mysqli_fetch_array($s7) )
        {
            $count7++;

            if($count7==3)
            {
              echo '<div class="slider-item" style="background-image: url('.$r7['p_location'].');" data-stellar-background-ratio="0.5">
                  <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" >

                      <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
                      </div>

                    </div>
                  </div>
                </div>';

            }
            elseif($count7>3)
            {
              break;
            }

        }

      ?>

 
    </section>
    <!-- End of Slider Section -->



    <?php


    if( !isset($_SESSION['order'])  )
    {

      ?>

        <section class="ftco-section ftco-cart">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ftco-animate">          
                <table class="table">
                  <thead class="thead-primary">
                    <tr class="text-center">
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>You have No Food Items Added in Cart.!</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>

                  </tbody>

                </table>
              
            </div>
          </div>
   
        </div>
      </section>

  <?php

          
    }

    else
    {

      $t_id = $_SESSION['order'] ;

    

      $q = "SELECT * FROM tbl_order WHERE table_id='$t_id' AND order_status='0' AND order_done='0'  ";
      $r = mysqli_query($con,$q);
     
      $n = mysqli_num_rows($r);


      if($n==0)
      {

        ?>

            <section class="ftco-section ftco-cart">
            <div class="container">
              <div class="row">
                <div class="col-md-12 ftco-animate">          
                    <table class="table">
                      <thead class="thead-primary">
                        <tr class="text-center">
                          <th>&nbsp;</th>
                          <th>&nbsp;</th>
                          <th>You have No Food Items Added in Cart.!  </th>
                          <th>Check Your Bill Section for Pursuing Order..!</th>
                          <th>&nbsp;</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>

                      <tbody>

                      </tbody>

                    </table>
                  
                </div>
              </div>
       
            </div>
          </section>

<?php

      }

    else
    {



    ?>

   <form method="post" action="confirm_order.php" >

    

    <?php

          while(  $s = mysqli_fetch_array($r) )
          {
            $p = $s['product_id'];


            $q3 = "SELECT * FROM tbl_order WHERE table_id='$t_id' AND product_id='$p' AND order_status='1' AND order_done='0' ";
            $r3 = mysqli_query($con,$q3);
            $n3 = mysqli_num_rows($r3);

            if($n3>0)
            {
                $y++;

                if($y==1 && $x==0)
                {

                    echo  '<section class="ftco-section ftco-cart">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-12 ftco-animate">          
                                    <table class="table">
                                      <thead class="thead-primary">
                                        <tr class="text-center">
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <th>You have No Food Items Added in Cart.!  </th>
                                          <th>Check Your Bill Section for Pursuing Order..!</th>
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                        </tr>
                                      </thead>

                                      <tbody>

                                      </tbody>

                                    </table>
                                  
                                </div>
                              </div>
                       
                            </div>
                          </section>';
                  }
                  else
                  {

                  }

            }

            else
            { 
                $x++;

               $q2 = "SELECT * FROM tbl_product WHERE product_id='$p' ";
               $r2 = mysqli_query($con,$q2);
               $s2 = mysqli_fetch_array($r2);

                if($x==1)
                {
                    echo ' <section class="ftco-section ftco-cart">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-12 ftco-animate">
                                  <div class="cart-list">
                                    <table class="table">
                                      <thead class="thead-primary">
                                        <tr class="text-center">
                                          <th>&nbsp;</th>
                                          
                                          <th>Product</th>
                                          <th>Price</th>
                                          <th>Quantity</th>
                                          <th>Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>';


                }
                else
                {

                }
           


?>

               <tr class="text-center">
                    <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td>
                    
                   <input type="hidden" name="p_id[]" value="<?php echo $p ?>">
                    
                    <td class="product-name">
                      <h3><?php echo $s2['product_name']; ?></h3>
                      <p><?php  echo $s2['product_description'];  ?></p>
                    </td>
                    
                    <td class="price">RS. <?php echo $s2['product_price'];  ?></td>
                    
                    
                    <td class="quantity"> 
                      <div class="input-group mb-3">
                        <input type="text" name="quantity[]" class="quantity form-control input-number" value="<?php echo $s['order_quant']; ?>" min="1" max="100">
                      </div>
                    </td>
                  
                    
                   <!-- <td class="total">$4.90</td>  -->
                  </tr><!-- END TR-->



<?php
          }

        }

?>

         </tbody>

              </table>
            </div>
          </div>
        </div>

        <div class="row justify-content-end">
          <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
            <input type="submit" name="submit" class="btn btn-primary py-3 px-4" value="Cofirm Order">
            
          </div>
        </div>

      </div>
    </section>

  </form>




<?php

    }

  }

    ?>

						   


     <!-- Footer -->
  
    <?php include "footer.php";  ?>

  <!--  End of Footer -->  
  

    
  </body>
</html>

$q = "UPDATE tbl_order SET order_quant='$fq' WHERE product_id='$p' AND table_id='$t_id' AND order_status='1' AND order_done='0' ";
<?php
		
		//session_start();

			$n9=0;

		  if(isset($_SESSION['order']))
		  {
		  		$t_id = $_SESSION['order'];

			  $q9 = "SELECT * FROM tbl_order WHERE table_id='$t_id' AND order_status='0' AND order_done='0' AND order_repeat='0' ";
		      $r9 = mysqli_query($con,$q9);
		     
		      $n9 = mysqli_num_rows($r9);

			      if($n9>0)
			      {

			      }
			      else
			      {
			      	$n9='?';
			      }


		  }
		  else
		  {
		  		$n9='?';
		  }

?>


<!-- header.. Top-bar  -->

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Black Bird's<small>Cafe</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">

	          <li class="nav-item <?php if($p_id==1){ echo 'active'; } ?>"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item <?php if($p_id==2){ echo 'active'; } ?>"><a href="menu.php" class="nav-link">Menu</a></li>
	         <!-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>  -->
	         
	          <li class="nav-item <?php if($p_id==3){ echo 'active'; } ?>"><a href="shop.php" class="nav-link">Order</a></li>

	           
	         
	         <!-- To set Dropdown -->
	        <!--  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="room.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>  -->
  
	         <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
	         <li class="nav-item cart <?php if($p_id==5){ echo 'active'; } ?>"><a href="cart.php" class="nav-link"><span class="icon icon-shopping_cart "></span><span class="bag d-flex justify-content-center align-items-center"><small><?php echo $n9; ?></small></span></a></li>  

	         <li class="nav-item <?php if($p_id==6){ echo 'active'; } ?>"><a href="bill.php" class="nav-link">Bill</a></li> 

	         <li class="nav-item <?php if($p_id==4){ echo 'active'; } ?>"><a href="about.php" class="nav-link">About</a></li>

	         <li class="nav-item <?php if($p_id==7){ echo 'active'; } ?>"><a href="contact_us.php" class="nav-link">Contact Us</a></li>


	        </ul>
	      </div>
		  </div>
</nav>

<!-- END nav -->
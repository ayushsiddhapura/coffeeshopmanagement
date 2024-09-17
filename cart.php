<?php
  session_start();
  include "connection.php";
  $p_id = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php"; ?>
</head>
<body>
  <!-- header (topbar) -->
  <?php include "header.php"; ?>
  <!-- end of header (topbar) -->

  <!-- Slider Section -->
  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('photos/cafe5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Slider Section -->

  <?php
  if (!isset($_SESSION['order'])) {
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
  } else {
    $t_id = $_SESSION['order'];

    $q = "SELECT * FROM tbl_order WHERE table_id='$t_id' AND order_status='0' AND order_done='0' AND order_repeat='0'";
    $r = mysqli_query($con, $q);

    $n = mysqli_num_rows($r);

    if ($n == 0) {
      unset($_SESSION['cart']);
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
    } else {
  ?>
      <form method="post" action="confirm_order.php">
        <section class="ftco-section ftco-cart">
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
                    <tbody>
                      <?php
                      while ($s = mysqli_fetch_array($r)) {
                        $p = $s['product_id'];

                        $q2 = "SELECT * FROM tbl_product WHERE product_id='$p'";
                        $r2 = mysqli_query($con, $q2);
                        $s2 = mysqli_fetch_array($r2);
                      ?>
                        <tr class="text-center">
                          <td class="product-remove"><a href="order_remove.php?product_id=<?php echo $p; ?>"><span class="icon-close"></span></a></td>
                          <input type="hidden" name="p_id[]" value="<?php echo $p ?>">
                          <td class="product-name">
                            <h3><?php echo $s2['product_name']; ?></h3>
                            <p><?php echo $s2['product_description']; ?></p>
                          </td>
                          <td class="price">RS. <?php echo $s2['product_price']; ?></td>
                          <td class="quantity">
                            <div class="input-group mb-3">
                              <input type="text" name="quantity[]" class="quantity form-control input-number" value="<?php echo $s['order_quant']; ?>" min="1" max="100" pattern="[1-9]{1}[0]{0,1}" required>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                <input type="submit" name="submit" class="btn btn-primary py-3 px-4" value="Confirm Order">
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
  <?php include "footer.php"; ?>
  <!-- End of Footer -->

</body>
</html>

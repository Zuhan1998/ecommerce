<html>
    <head>
      <?php
          include('functions.inc.php');
          // include('action.php');
          include('connection.php');

          $conn = mysqli_connect('localhost', 'root', '', 'zerox');

          $sql = "SELECT id,unit,cart_product_name,cart_product_price,stock FROM cart";
          $res = mysqli_query($conn, $sql);
        
          $sql2 = "SELECT SUM(unit*cart_product_price) FROM cart";
          $res2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($res2);
        
          $i = 0;
          $total = 0;


      ?>

    </head>
    <body>
    <form>
  <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
      <div class="card-header">
        <h2><span name=customer_name value="<?php echo $_SESSION['username']; ?>"> <?php echo $_SESSION['username']; ?></span>'s Order Details</h2>
      </div>
      <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered m-0">
              <thead>
                <tr>
                  <!-- Set columns width -->
                  <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                  <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                  <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                  <th class="text-right py-3 px-4" style="width: 100px;"></th>
                  
                  <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="p-4">
                    <div class="media align-items-center">
                      <img src="" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                      <div class="media-body">
                        <a href="#" class="d-block text-dark" name="cpname" value="<?php echo $row['cart_product_name'] ?>"><?php echo $row['cart_product_name'] ?></a>
                        <small>
                          <span class="text-muted" name="cstock" value="<?php echo $row['stock'] ?>">Stock: <?php echo $row['stock'] ?></span>
                          <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                          <!-- <span class="text-muted">Ships from: </span> China -->
                        </small>
                      </div>
                    </div>
                  </td>
                  <td class="text-right font-weight-semibold align-middle p-4" name="cproduct_price" value="<?php echo $row['cart_product_price'] ?>">TK <?php echo $row['cart_product_price'] ?></td>
                  <td class="align-middle p-4"><input type="text" class="form-control text-center" name="cunit" value="<?php echo $row['unit'] ?>"></td>
                  <td class="text-right font-weight-semibold align-middle p-4" name="ctotal" value="<?php echo $row['unit'] * $row['cart_product_price'] ?>">TK <?php echo $row['unit'] * $row['cart_product_price'] ?></td>
                  <!-- <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td> -->
                  

                  <?php $i += $row['unit'] * $row['cart_product_price'] ?>
                </tr>

              <?php }

            echo '</tbody>
              </table>
            </div>
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label><div class="text-large"><strong>';
            print 'Tk '.$i ?><br><br>
              </strong>

                <label for="fname">Shipping Address:</label>
                <input type="text" id="address" name="address"><br>

                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday">

          </div>
        </div>
    </div>
  </div><br>



  <div class="float-right">
    <button type="button" onclick="location.href='cart.php'"  class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
    <button type="button" onclick="location.href='home.php'" class="btn btn-lg btn-primary mt-2">Checkout</button></br>

  </div>
</form>
        

    </body>
</html>
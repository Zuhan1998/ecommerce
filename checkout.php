<html>

<head>

  <link rel="stylesheet" href="assets/css/style2.css">
  <!-- links to css file -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  <?php
  include('functions.inc.php');
  // include('action.php');
  include('connection.php');

  $conn = mysqli_connect('localhost','root','','zerox');

  $sql = "SELECT * FROM cart";
  $res = mysqli_query($conn, $sql);

  $x = 0;
  $i = 0;
  $total = 0;
  




  if(isset($_POST['add']))
  {
    $order_id=uniqid();
    $customername = $_POST['customer_name'];
    $cdate = $_POST['date'];
    $caddress = $_POST['address'];

//working old one 
    // $ccunit = implode(',', $_POST['cunit']);
    // $ccproduct_name = implode(',', $_POST['cpname']);
    // $ccproduct_price = implode(',', $_POST['cproduct_price']);
    // $ccstock = implode(',', $_POST['cstock']);
    // $cctotal = implode(',', $_POST['ctotal']);
    // $ccunit = implode(',', $_POST['cunit']);

    $ccunit = $_POST['cunit'];
    $ccproduct_name = $_POST['cpname'];
    $ccproduct_price = $_POST['cproduct_price'];
    $ccstock = $_POST['cstock'];
    $cctotal = $_POST['ctotal'];
    $ccunit = $_POST['cunit'];


    // $query="INSERT INTO orders (customer_name,date,address,unit,product_name,product_price,stock,total)VALUES('$customername','$cdate','$caddress','".$ccunit."','".$ccproduct_name."','".$ccproduct_price."','".$ccstock."','".$cctotal."')";

    for($i = 0; $i<($_SESSION['count']); $i++){ 
      $query="INSERT INTO orders (order_id,customer_name,date,address,unit,product_name,product_price,stock,total)VALUES('$order_id','$customername','$cdate','$caddress','$ccunit[$i]','$ccproduct_name[$i]','$ccproduct_price[$i]','$ccstock[$i]','$cctotal[$i]');";
      mysqli_query($conn,$query);
   }
   
   header("location: http://localhost/zerox/payment.php");
  //  print $_SESSION['count'];
   
    // if(mysqli_query($conn,$query)==TRUE){
    //   print "Data inserted";

      // header("location: http://localhost/zerox/payment.php");

    // }else{
    //     echo "Data not Inserted";
    // }


}


  // $sql2 = "SELECT SUM(unit*cart_product_price) FROM cart";
  // $res2 = mysqli_query($conn, $sql2);
  // $row2 = mysqli_fetch_assoc($res2);


  ?>

</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="container px-3 my-5 clearfix">
      <!-- Shopping cart table -->
      <div class="card">
        <div class="card-header">
          <h2><span> <?php echo $_SESSION['username']; ?></span>'s Order Details</h2>
          <input hidden class="text-right font-weight-semibold align-middle p-4" name="customer_name" value="<?php echo $_SESSION['username']; ?>">

        </div>
        <?php $_SESSION['count'] = 0; while ($row = mysqli_fetch_assoc($res)) { ?>
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
                          <a href="#" class="d-block text-dark"><?php echo $row['cart_product_name'] ?></a>
                          <input hidden class="text-right font-weight-semibold align-middle p-4" name="cpname[]" value="<?php echo $row['cart_product_name'] ?>">

                          <small>
                            <span class="text-muted">Stock: <?php echo $row['stock'] ?></span>
                            <input hidden class="text-right font-weight-semibold align-middle p-4" name="cstock[]" value="<?php echo $row['stock'] ?>">

                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                            <!-- <span class="text-muted">Ships from: </span> China -->
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">TK <?php echo $row['cart_product_price'] ?></td>
                    <!-- <td class="align-middle p-4"><input type="text" class="form-control text-center" name="cunit" value="<?php echo $row['unit'] ?>"></td> -->
                    <input hidden class="text-right font-weight-semibold align-middle p-4" name="cproduct_price[]" value="<?php echo $row['cart_product_price'] ?>">

                    <td class="text-right font-weight-semibold align-middle p-4" ><?php echo $row['unit'] ?></td>
                    <input hidden class="text-right font-weight-semibold align-middle p-4" name="cunit[]" value="<?php echo $row['unit'] ?>">

                    <td class="text-right font-weight-semibold align-middle p-4">TK <?php echo $row['unit'] * $row['cart_product_price'] ?></td>
                    <!-- <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td> -->
                    <input hidden class="text-right font-weight-semibold align-middle p-4" name="ctotal[]" value="<?php echo $row['unit'] * $row['cart_product_price'] ?>">


                    <?php $i += $row['unit'] * $row['cart_product_price'] ?>
                  </tr>

                    <?php $i++; $_SESSION['count']++; ?>
                
                <?php }

              echo '</tbody>
              </table>
            </div>
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label><div class="text-large"><strong>';
              print 'Tk ' . $i ?><br><br>
                </strong>


                <label for="fname">Shipping Address:</label>
                <input type="text" id="address" name="address"><br>

                <label for="birthday">Date:</label>
                <input type="date" id="date" name="date">

            </div>
          </div>
      </div>
    </div><br>
  </div>
  
  </form>

  <div class="float-right">
    <button type="button" onclicks="location.href='home.php'" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back</button>
    <button type="submit" name="add" class="btn btn-lg btn-success mt-2" value="submit">Proceed to Payment</button></br>


  <!-- <div class="float-right">
    <button type="button" onclicks="location.href='home.php'" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back</button>
    <button type="submit" name="submit" class="btn btn-lg btn-success mt-2" value="submit">Proceed to Payment</button></br>

  </div>
   -->


</body>

</html>
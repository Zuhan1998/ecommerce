<head>
  <title>Zerox</title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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


  $conn = mysqli_connect('localhost', 'root', '', 'zerox');

  if (isset($_POST['submit'])) {
    $cunits = $_POST['units'];
    $cproduct_name = $_POST['product_name'];
    $cproduct_price = $_POST['product_price'];
    $c_stock = $_POST['stock'];

    // $query4="INSERT INTO registration (cust_name,cust_email,cust_uname,cust_pass,qty,image)VALUES('$cname','$cemail','$cuname','$cpass')";

    print $query4 = "INSERT INTO cart (unit,cart_product_name,cart_product_price,stock)VALUES('$cunits','$cproduct_name','$cproduct_price','$c_stock')";

    if (mysqli_query($conn, $query4) == TRUE) {
      // move_uploaded_file($tmpname,$folder);
      print "Data Inserted";
      header("location: http://localhost/zerox/cart.php");
    } else {
      echo "Data not Inserted";
    }

    // if($type=='delete'){
    //   $id=get_safe_value($conn,$_GET['id']);
    //   $delete_sql="delete from cart where id='$id'";
    //   mysqli_query($conn,$delete_sql);
    // }

  }

  

  if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']); 

    if($type=='delete'){
      $id=get_safe_value($conn,$_GET['id']);
      $delete_sql="delete from cart where id='$id'";
      mysqli_query($conn,$delete_sql);
    }

}


  $s = "SELECT username from  registration";

  $result = mysqli_query($conn, $s);
  // stores query

  $num = mysqli_num_rows($result);


  if($num >= 1){

      // $_SESSION['username'] = $uname;
    // session variable stores the current username
  }
  else{
    // header('location:reg.php');
    print "You need to register to make a purchase";
  }





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
        <h2><span> <?php echo $_SESSION['username']; ?></span>'s Shopping Cart</h2>
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
                        <a href="#" class="d-block text-dark"><?php echo $row['cart_product_name'] ?></a>
                        <small>
                          <span class="text-muted">Stock: <?php echo $row['stock'] ?></span>
                          <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                          <!-- <span class="text-muted">Ships from: </span> China -->
                        </small>
                      </div>
                    </div>
                  </td>
                  <td class="text-right font-weight-semibold align-middle p-4">TK <?php echo $row['cart_product_price'] ?></td>
                  <td class="align-middle p-4"><input type="text" class="form-control text-center"></td>
                  <td class="text-right font-weight-semibold align-middle p-4">TK <?php echo $row['unit'] * $row['cart_product_price'] ?></td>
                  <!-- <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td> -->
                  
                  <td class="text-center align-middle px-0"><?php echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>"; ?></td>


                  <?php $i += $row['unit'] * $row['cart_product_price'] ?>
                </tr>

              <?php }

            echo '</tbody>
              </table>
            </div>
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label><div class="text-large"><strong>';
            print 'Tk '.$i ?>
              </strong>
          </div>
        </div>
    </div>
  </div>



  <div class="float-right">
    <button type="button" onclick="location.href='home.php'"  class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
    <button type="button" onclick="location.href='home.php'" class="btn btn-lg btn-primary mt-2">Checkout</button>
  </div>
</form>

  </div>
  </div>
  </div>
</body>
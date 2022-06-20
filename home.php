<?php
include('functions.inc.php');
// include('adminpanel.php');
include('action.php');

// session_start();

if(!isset($_SESSION['username'])){
    header('location:login.html');
}
// cannot get into home without loggin in


?>

<html>
<head>
    <title>Zerox</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/style2.css">
    <!-- links to css file -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css link bs5 -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- js bs5 link -->

        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
    
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- template stuff -->

    <header>
        <div class >
            <div class="row">
                <div>
                <ul>
                    <!-- <li><img src="assets/images/logo.png" alt="Logo"></li> -->
                    <li style="margin-left:8px"><h2>Welcome <?php echo $_SESSION['username']; ?></h2></li>
                    <a href ="logout.php" style="margin-left:20px"> logout </a> <br> <br>
                    <!-- <li><a class="active">Categories</a></li> -->
                    <li style="margin-left:20px"><a href="cart.php">Cart</a></li>
                    <li style="margin-left:20px"><a href="history.php">Order History</a></li>
                </ul>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
</head>
<body>

<div>
  <!-- <h2><input type="text" placeholder="Search products.."></h2> -->
</div>
    <!--====== PRODUCT PART START ======-->
    
    <section id="product" class="product-area pt-100 pb-130" style="margin-left: 400px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-8" style="margin-top: -169px;">
                <h3>Product List</h3>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-furniture" role="tabpanel" aria-labelledby="v-pills-furniture-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">
                                <?php
                                    $sql2 = "SELECT * FROM products";
                                    $res2 = mysqli_query($con, $sql2);
                                    $row = mysqli_fetch_assoc($res2);

                                    $i=1;
                                    while($row = mysqli_fetch_assoc($res2)){?>

                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                            <a href='productpage.php?id=<?php echo $row['product_id']?>'><?php 
                                                    $image2 = $row['image'];
                                                    echo "<img src='./uploads/$image2'>"?></a>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href='productpage.php?id=<?php echo $row['product_id']?>'><?php echo $row['product_name']?></a></h5>
                                                                    
                                                <!-- <a href='attendance_add.php?id=<?php $row['product_id']?>'> -->

                                                <span class="regular-price">Tk <?php echo $row['product_price']?></span>
                                                <input type="hidden" name="prodId" value="<?php echo $row['product_id']?>">                                            
                                                <input type="hidden" name="catId" value="<?php echo $row['category_id']?>">                                            
                                                <input type="hidden" name="prodqty" value="<?php echo $row['qty']?>">                                            

                                            </div>
                                        </div> <!-- single product items -->
                                    </div>

                                    <?php } ?>
                                    <!-- <div class="col-md-4"> 
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="#"><img src="assets/images/product/p-2.jpg" alt="Product"></a>
                                                <div class="product-discount-tag">
                                                    <p>-20%</p>
                                                </div>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#">Touchwood Chair</a></h5>
                                                
                                                <span class="regular-price">$129.00</span>
                                                <span class="discount-price">$159.00</span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="#"><img src="assets/images/product/p-3.jpg" alt="Product"></a>
                                                <div class="product-discount-tag">
                                                    <p>-10%</p>
                                                </div>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#">Classic Wardrobe</a></h5>
                                                
                                                <span class="regular-price">$89.00</span>
                                                <span class="discount-price">$129.00</span>
                                            </div>
                                        </div> 
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="#"><img src="assets/images/product/p-1.jpg" alt="Product"></a>
                                                <div class="product-discount-tag">
                                                    <p>-60%</p>
                                                </div>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#">Touchwood Chair</a></h5>
                                                
                                                <span class="regular-price">$59.00</span>
                                                <span class="discount-price">$69.00</span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-product-items">
                                            <div class="product-item-image">
                                                <a href="#"><img src="assets/images/product/p-2.jpg" alt="Product"></a>
                                                <div class="product-discount-tag">
                                                    <p>-60%</p>
                                                </div>
                                            </div>
                                            <div class="product-item-content text-center mt-30">
                                                <h5 class="product-title"><a href="#">Touchwood Chair</a></h5>
                                                
                                        
                                                <span class="regular-price">$59.00</span>
                                                <span class="discount-price">$69.00</span>
                                            </div>
                                        </div> 
                                    </div> -->
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
                    </div> <!-- tab content --> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PRODUCT PART ENDS ======-->
</body>

</html>
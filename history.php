<html>
    <head>

    <?php
        include('functions.inc.php');
        // include('action.php');
        include('connection.php');
        // include('checkout.php');

        $conn =  mysqli_connect('localhost','root','','zerox');

        $x=$_SESSION['username'];
        $sql = "SELECT * FROM orders where customer_name='$x'";
        $res =  mysqli_query($conn, $sql);


        $i=0;
    ?>

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
                    <!-- <li><a class="active">Categories</a></li> -->
                </ul>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    </head>

    <body>
        <h2>Order History</h2>



        <?php
            $sum=0;
            
            print '  Products ordered: '; echo nl2br("\n");
            while ($rows = mysqli_fetch_assoc($res)) {
                print 'Customer Name : '; echo $rows['customer_name'];echo nl2br("\n");
                print '     Order id- '; echo $rows['order_id'];
                echo nl2br("\r\n");
                print 'shipped to: '; echo $rows['address'];
                print ' ; product name : ';echo $rows['product_name'];
                print ' ; units: '; echo $rows['unit'];
                print ' ; price: '; echo $rows['product_price'];   

                print nl2br("\r\n\r\n");
            }


        ?>

           <br>
           <a href ="home.php" style="margin-left:20px"> Back to Home </a> <br> <br>


        <script>
            var dt = new Date();
            document.getElementById('date-time').innerHTML=dt;
        </script>

    </body>
</html>
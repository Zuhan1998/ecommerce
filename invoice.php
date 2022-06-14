<html>
    <head>
    <?php
        include('functions.inc.php');
        // include('action.php');
        include('connection.php');
        // include('checkout.php');

        $conn =  mysqli_connect('localhost','root','','zerox');

        $x=$_SESSION['username'];
        $sql = "SELECT * FROM orders where customer_name = '$x'";
        $res =  mysqli_query($conn, $sql);
        $res2 = mysqli_query($conn, $sql);


        $i=0;
    ?>
    </head>

    <body>

    <p>Invoice generated on <span id='date-time'></span>.</p>

        <?php
            print 'Name: '. $_SESSION['username'];
        ?>
    <br>
        <?php if($row = mysqli_fetch_assoc($res)){  ?>

        <span>Shipped to: <?php print $row[['address'][0]]; echo nl2br("\r\n"); print 'Invoice number '; echo $row[['order_id'][0]]?></span><br>
                  
        <span>Number of products: <?php print $_SESSION['count']; ?></span><br><br>
        <?php } ?>

        <?php
            $sum=0;
            print '  Products ordered:'; echo nl2br("\n");
            while ($rows = mysqli_fetch_assoc($res2)) {
             echo $rows['product_name']; print ' | units:'; echo $rows['unit']; print ' | price:'; echo $rows['product_price']; echo nl2br("\r\n");  $sum += $rows['total']; 
                } 
            echo nl2br("\r\n");
            print 'total amount paid '.$sum; echo nl2br("\r\n");
        ?>

        <?php
        $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
        if ($option) {
            print 'payment type: ';echo htmlentities($_POST['taskOption'], ENT_QUOTES, "UTF-8");
        } else {
            echo "task option is required";
            exit; 
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
<html>
    <head>

    <?php
        include('functions.inc.php');
        // include('action.php');
        include('connection.php');
        // include('checkout.php');

        $conn =  mysqli_connect('localhost','root','','zerox');
        $sql = "SELECT * FROM orders";
        $res =  mysqli_query($conn, $sql);


        $i=0;
    ?>

    <title>Zerox</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="assets/css/style2.css"> -->
    <!-- links to css file -->

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- css link bs5 -->

    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"  crossorigin="anonymous">
    <!-- css link bs5 -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"  crossorigin="anonymous"></script>
    <!-- css link bs5 -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"  crossorigin="anonymous"></script>
    <!-- js bs5 link -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js" crossorigin="anonymous"></script>
    <!-- js bs5 link -->

    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"  crossorigin="anonymous"></script>
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


    <script>
            var minDate, maxDate;
            // Custom filtering function which will search data in column four between two values
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date( data[3] );
            
                    if (
                        ( min === null && max === null ) ||
                        ( min === null && date <= max ) ||
                        ( min <= date   && max === null ) ||
                        ( min <= date   && date <= max )
                    ) {
                        return true;
                    }
                    return false;
                }
            );
    </script>

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



        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
    <table id="example" class="display nowrap" style="width:100%">
        <!-- <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead> -->
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Units</th>
                <th>Stock</th>
                <th>Total</th>
            </tr>
        </thead>
        <!-- <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
    </table> -->
    <?php $_SESSION['count'] = 0; while ($row = mysqli_fetch_assoc($res)) { ?>
        <tbody>
            <tr>
                <td><?php print $row['order_id'] ?></td>
                <td><?php print $row['customer_name'] ?></td>
                <td><?php print $row['address'] ?></td>
                <td><?php print $row['date'] ?></td>
                <td><?php print $row['product_name'] ?></td>
                <td><?php print $row['product_price'] ?></td>
                <td><?php print $row['unit'] ?></td>
                <td><?php print $row['stock'] ?></td>
                <td><?php print $row['total'] ?></td>
            </tr>
            
        </tbody>
        <?php $i++; $_SESSION['count']++; } ?>
    </table>

    <br>
    <a href ="home.php" style="margin-left:20px"> Back to Home </a> <br> <br>


        <script>
            $(document).ready(function() {
                // Create date inputs
                minDate = new DateTime($('#min'), {
                    format: 'MMMM Do YYYY'
                });
                maxDate = new DateTime($('#max'), {
                    format: 'MMMM Do YYYY'
                });
            
                // DataTables initialisation
                var table = $('#example').DataTable();
            
                // Refilter the table
                $('#min, #max').on('change', function () {
                    table.draw();
                });
            });
        </script>

        <script>
        jQuery(document).ready(function($) {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "server_processing.php"
            } );
        } );
        </script>

    </body>
</html>
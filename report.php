<html>


    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <!-- css link bs5 -->

        <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <!-- css link bs5 -->

        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>


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

    </head>

    <body>
    <h2>Customer Ledger</h2>
    <table id="example" class="table table-striped" style="width:100%">
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




        <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
        </script>
    </body>
</html>
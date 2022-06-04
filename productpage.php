<?php
include('functions.inc.php');
// include('adminpanel.php');
include('action.php');
?>

<?php
$zid= $_GET['id'];
?>

<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <link rel="stylesheet" href="stylelogin.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
    body{
        background-image: url("https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80") ;
    
        /* Full height */
        height: 100vh; 
    
        /* Center and scale the image nicely */
        background-position:center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

    <?php
    $sql = "SELECT product_name,product_price,qty,image FROM products where product_id='$zid'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>



    </head>
    <body>
    <div>
        
        <div class="form">

			<form action="cart.php" method="post">
                
			<table width="100%" cellpadding="0" cellspacing="0">
				
			<tr><td colspan="4"><hr/></td></tr>	
            <div class="single-product-items">
                <div class="product-item-image" style="height: 150px;">
                    <?php 
                        $image2 = $row['image'];
                        echo "<img src='./uploads/$image2'".'style="height: 150px;"'.">" ?></a>
                </div>
            </div>

        	</table>
            <tr>
                <td><?php echo $row['product_name']?></td><br>
                <td><?php echo 'PRICE: TK ' .$row['product_price']?></td><br>
                <td><?php echo 'Stock: ' .$row['qty']?></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <input type="number" id="product_unit" name="units" class="form-control" placeholder="enter units"><br><br>
            <input type="hidden" id="product_name" name="product_name" value="<?php echo $row['product_name']?>">
            <!-- <input type="hidden" id="product_image" name="product_image" value="<?php echo $row['image']?>"> -->
            <input type="hidden" id="product_price" name="product_price" value="<?php echo $row['product_price']?>">
            <input type="hidden" id="stock" name="stock" value="<?php echo $row['qty']?>">
            <!-- <input type="hidden" id="stock" name="stock" value="getElementById(product_unit)"> -->

			<tr>
				<input style="background-color:lightskyblue" name="submit" type="submit" value="Add to Cart">
			</tr>
        </form>
        <button type="button" onclick="location.href='home.php'"  class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back</button>
    	</div>
    </div>
    </body>
</html>
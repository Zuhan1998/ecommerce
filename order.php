<?php

session_start();
include('functions.inc.php');
include('action.php');
include('connection');





// $sql2 = "SELECT * FROM products";
// $res2 = mysqli_query($con, $sql2);
// $row = mysqli_fetch_assoc($res2);

$s = "SELECT * from  registration where username ='$uname'";

$result = mysqli_query($conn, $s);
// stores query

$num = mysqli_num_rows($result);


if($num == 1){

    $_SESSION['username'] = $uname;
  // session variable stores the current username
}
else{
  header('location:reg.php');
  print "You need to register to make a purchase";
}




$sql = "SELECT id,unit,cart_product_name,cart_product_price,stock FROM cart";
$res = mysqli_query($conn, $sql);

$sql2 = "SELECT SUM(unit*cart_product_price) FROM cart";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($res2);

?>

<html>
    <head>

    </head>
    <body>
        

    
    </body>
</html>
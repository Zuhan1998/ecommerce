<?php
// include 'connection.php';

$conn = mysqli_connect('localhost','root','','zerox');

if(isset($_POST['add'])){
    $product_id = $_POST['pid'];
    $category_id = $_POST['cid2'];
    $product_name = $_POST['pname'];
    $product_price = $_POST['pprice'];
    $qty = $_POST['qty'];

    $image=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    // $folder='zerox/uploads/'.$imagename;

    $des=$_SERVER['DOCUMENT_ROOT']."/zerox/uploads/".$image."";
    move_uploaded_file($_FILES["image"]["tmp_name"],$des);  

    print $query="INSERT INTO products (product_id,category_id,product_name,product_price,qty,image)VALUES('$product_id','$category_id','$product_name','$product_price','$qty','$image')";

    if(mysqli_query($conn,$query)==TRUE){
       // move_uploaded_file($tmpname,$folder);
        echo "Data Inserted";
        header("location: http://localhost/zerox/products.php");

    }else{
        echo "Data not Inserted";
    }
}

if(isset($_POST['adduser'])){
    $cust_name = $_POST['cname'];
    $cust_email = $_POST['cemail'];
    $cust_uname = $_POST['cuname'];
    $cust_pass = $_POST['cpass'];

    // $query4="INSERT INTO registration (cust_name,cust_email,cust_uname,cust_pass,qty,image)VALUES('$cname','$cemail','$cuname','$cpass')";

    $query4="INSERT INTO registration (name,email,username,passwrd)VALUES('$cust_name','$cust_email','$cust_name','$cust_pass')";

    if(mysqli_query($conn,$query4)==TRUE){
       // move_uploaded_file($tmpname,$folder);
        echo "Data Inserted";
        header("location: http://localhost/zerox/users.php");

    }else{
        echo "Data not Inserted";
    }
}

?>
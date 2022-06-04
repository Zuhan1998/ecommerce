<?php
include 'connection.php';

// if(isset($_POST['add'])){
//     $product_id = $_POST['pid'];
//     $category_id = $_POST['cid'];
//     $product_name = $_POST['pname'];
//     $product_price = $_POST['pprice'];
//     $qty = $_POST['qty'];
//     $photo = $_FILES['image']['name'];

//     print $upload = "uploads/".$photo;

    
//     $query="INSERT INTO products(product_id,category_id,product_name,product_price,qty,photo)VALUES(?,?,?,?,?)";
//     $stmt = $con->prepare($query);
//     $stmt->bind_param("ssssss",$product_id,$category_id,$product_name,$product_price,$qty,$upload);
//     $stmt->execute();
//     move_uploaded_file($_FILES['image']['tmp_name'], $upload);
// }

if(isset($_POST['add'])){
    $id = $_POST['cid'];
    $category = $_POST['cname'];
    $status = $_POST['cstatus'];
    
    $query="INSERT INTO category (id,category,status)VALUES('$id','$category','$status')";
    $stmt = $con->prepare($query);
    $stmt->execute();
    header("location: http://localhost/zerox/manageCategory.php");
}

?>
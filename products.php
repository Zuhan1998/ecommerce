<?php
// require('connection.php');
include('functions.inc.php');
include('adminpanel.php');
include('action.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']); 
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']); 
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='active'){
            $status='1'; 
        }else{
            $status='0';
        }
        $update_status_sql="update category set status='$status' where id='$id'";
        mysqli_query($con,$update_status_sql);
    }

    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from category where id='$id'";
        mysqli_query($con,$delete_sql);
    }

}

$sql = "SELECT * FROM category order by category desc";
$res = mysqli_query($con, $sql);

$sql3 = "SELECT category FROM category";
$res3 = mysqli_query($con, $sql3);
$array=array();

$all_categories = mysqli_query($con,$sql3);
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/stylez.css">

</head>

<body>

    <div style="margin-left:25%;padding:1px 16px;">
        <h2 class="mt-2"><input type="text" placeholder="Search products.."></h2>
        <div class="col-md-4">
                <hr>
                <h3 class="text-center text-info">Add Products</h3>
                <hr>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <!-- enctype is for being able to upload images through form -->
                   
                    <div class="form-group">
                        <input type="text" name="pid" class="form-control" placeholder="enter product id">
                    </div><br>

                    <div>
                    <?php 
                        while($row = mysqli_fetch_assoc($res3)){?>
                           
                            <!-- <span><?php print $row["category"]." " ;?></span><input type="checkbox" name="cid2" value="<?php print $row["category"] ?>"/><br/> -->
                          

                        <?php }
                        // $row1 = mysqli_fetch_assoc($res3);
                        // print_r($row1);
                        ?>

                        <label>Select a Category</label>
                        <select name="cid2">
                            <?php 
                                // use a while loop to fetch data 
                                // from the $all_categories variable 
                                // and individually display as an option
                                while ($category = mysqli_fetch_array(
                                        $all_categories,MYSQLI_ASSOC)):; 
                            ?>
                                <option value="<?php echo $category["category"];
                                    // The value we usually set is the primary key
                                ?>">
                                    <?php echo $category["category"];
                                        // To show the category name to the user
                                    ?>
                                </option>
                            <?php 
                                endwhile; 
                                // While loop must be terminated
                            ?>
                        </select>
                  
                        <br>
                        <br>
                    </div>

                    <div class="form-group">
                        <input type="text" name="pname" class="form-control" placeholder="enter name">
                    </div><br>

                    <div class="form-group">
                        <input type="number" name="pprice" class="form-control" placeholder="enter price">
                    </div><br>

                    <div class="form-group">
                        <input type="number" name="qty" class="form-control" placeholder="enter quantity">
                    </div><br>

                    <input type="file" name="image"><br><br>

                    <div class="form-group">
                        <input type="submit" name="add" class="btn btn-primary">
                    </div>

                    <form>
            </div>
        </div>
    </div>

            <h3 class="text-center text-info">Products</h3>
            <div class="col-md-6" style="margin-left: 400px;">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">product ID</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM products";
                        $res2 = mysqli_query($con, $sql2);
                        $row = mysqli_fetch_assoc($res2);
                        
                        $i=1;
                        while($row = mysqli_fetch_assoc($res2)){?>
                            <tr>
                                <td class="serial"><?php echo $i ?></td>
                                <td><?php echo $row['product_id']?></td>
                                <td><?php echo $row['category_id']?></td>
                                <td><?php echo $row['product_name']?></td>
                                <td>Tk <?php echo $row['product_price']?></td>
                                <td><?php echo $row['qty']?></td>
                                <td><?php 
                                $image2 = $row['image'];
                                echo "<img src='./uploads/$image2'>"?></td>
                            </tr>
                            
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
</body>
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
        $delete_sql="delete from cart where id='$id'";
        mysqli_query($con,$delete_sql);
    }

}

$sql = "SELECT * FROM category order by category desc";
$res = mysqli_query($con, $sql);


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
        <div class="row">
            <div class="col-md-4">
                <hr>
                <h3 class="text-center text-info">Add Category</h3>
                <hr>
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <!-- enctype is for being able to upload images through form -->
                   
                    <div class="form-group">
                        <input type="text" name="cid" class="form-control" placeholder="enter category id">
                    </div><br>


                    <div class="form-group">
                        <input type="text" name="cname" class="form-control" placeholder="enter category name">
                    </div><br>

                    <div class="form-group">
                        <input type="number" name="cstatus" class="form-control" placeholder="enter status" min="0" max="1">
                    </div><br>

                    <div class="form-group">
                        <input type="submit" name="add" class="btn btn-primary">
                    </div>

                    <form>
            </div>
            <!-- form -->
            <div class="col-md-8">
                <hr>
                <div class="content">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Category</strong>
                                    </div>
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th>ID</th>
                                                    <th>Categories</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                while($row = mysqli_fetch_assoc($res)){?>
                                                    <tr>
                                                        <td class="serial"><?php echo $i ?></td>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['category']?></td>
                                                        <td>
                                                            <?php 
                                                            if($row['status']==1){
                                                                echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>&nbsp";
                                                            }
                                                            else{
                                                                echo "<a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>&nbsp";
                                                            }
                                                            echo "<a href='?type=delete&id=".$row['id']."'>Delete</a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- database records -->
        </div>
    <div>
</body>
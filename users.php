<?php
// require('connection.php');
include('functions.inc.php');
include('adminpanel.php');
include('action.php');

if(isset($_GET['type']) && $_GET['type']!=''){

    if($type=='delete'){
        $name=get_safe_value($con,$_GET['name']);
        $delete_sql="delete from category where id='$name'";
        mysqli_query($con,$delete_sql);
    }

}

$sql = "SELECT * FROM registration";
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
        <h2 class="mt-2"><input type="text" placeholder="Search products.."></h2>
        <div class="col-md-4">
                <hr>
                <h3 class="text-center text-info">Add User</h3>
                <hr>
                <form action="insert.php" method="post">

                    <div class="form-group">
                        <input type="text" name="cname" class="form-control" placeholder="enter name">
                    </div><br>

                    <div class="form-group">
                        <input type="text" name="cemail" class="form-control" placeholder="enter email">
                    </div><br>

                    <div class="form-group">
                        <input type="text" name="cuname" class="form-control" placeholder="enter username">
                    </div><br>

                    <div class="form-group">
                        <input type="text" name="cpass" class="form-control" placeholder="enter password">
                    </div><br>

                    <div class="form-group">
                        <input type="submit" name="adduser" class="btn btn-primary">
                    </div>

                    <form>
            </div>
        </div>
    </div>
    <div style="margin-left:25%;padding:1px 16px;">
        <div class="col-md-8">
            <h3 class="text-center text-info">User Info</h3>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>username</th>
                            <th>password</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        while($row = mysqli_fetch_assoc($res)){?>
                            <tr>
                                <td class="serial"><?php echo $i ?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['passwrd']?></td>
                                <td>
                                    <?php 
                                    echo "<a href='?type=delete&name=".$row['name']."'>Delete</a>";
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
</body>
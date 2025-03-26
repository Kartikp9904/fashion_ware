<?php
require ('top.php');
$sql = "SELECT * FROM users";
$res = mysqli_query($con, $sql);
$row = mysqli_num_rows($res);

$sql2 = "SELECT * FROM product";
$res2 = mysqli_query($con, $sql2);
$row2 = mysqli_num_rows($res2);

$sql3 = "SELECT * FROM categories";
$res3 = mysqli_query($con, $sql3);
$row3 = mysqli_num_rows($res3);

$sql4 = "SELECT * FROM orders";
$res4 = mysqli_query($con, $sql4);
$row4 = mysqli_num_rows($res4);

$sql5 = "SELECT SUM(total_amt) AS total_sales FROM orders_info";
$res5 = mysqli_query($con, $sql5);
$row5 = mysqli_fetch_assoc($res5);
$total_amt = $row5['total_sales'];


?>
<div class="content pb-0">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <a href="users.php">
                        <div class="card-body bg-flat-color-1">
                            <h4 class="card-title text-white">Total Users</h4>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $row; ?></h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users fa-4x"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <a href="product.php">
                        <div class="card-body bg-flat-color-1">
                            <h4 class="card-title text-white">Total Product</h4>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $row2; ?></h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-cubes fa-4x"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <a href="categories.php">
                        <div class="card-body bg-flat-color-1">
                            <h4 class="card-title text-white">Total Categories</h4>
                            <div class="d-inline-block">
                                <h2 class="text-white"></i><?= $row3; ?></h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-list-ul fa-4x"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <a href="orders.php">
                        <div class="card-body bg-flat-color-1">
                            <h4 class="card-title text-white">Total Orders</h4>
                            <div class="d-inline-block">
                                <h2 class="text-white"><?= $row4; ?></h2>
                                <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                            </div>
                            <span class="float-right display-5 opacity-5"><i
                                    class="fa fa-shopping-bag fa-4x"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body bg-flat-color-1">
                        <h4 class="card-title text-white">Total Sales</h4>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_amt; ?></h2>
                            <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-rupee fa-4x"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require ('footer.php');
?>
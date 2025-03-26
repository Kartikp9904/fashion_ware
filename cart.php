<?php require('producttop.php'); 
$total2="0";
if(isset($_GET['delete'])){
  $id = $_GET['id'];
  $sql4=mysqli_query($con,"DELETE FROM cart WHERE id = '$id'");
}
if(isset($_GET['op'])){
  $op=$_GET['op'];
  $id = $_GET['id'];
  if($op=='plus'){
    $sql = mysqli_query($con,"SELECT qty FROM cart WHERE id = '$id' ");
    $row=mysqli_fetch_assoc($sql);
    $plus1 = $row['qty']+1;
    $sql2=mysqli_query($con,"UPDATE cart SET qty= '$plus1' WHERE id='$id'");
    echo "<script>window.open('cart.php','_self')</script>";  
  }elseif($op=='minus'){
    $sql3 = mysqli_query($con,"SELECT qty FROM cart WHERE id = '$id'");
  $row3=mysqli_fetch_assoc($sql3);
  $minus1 = $row3['qty']-1;
  $sql4=mysqli_query($con,"UPDATE cart SET qty= '$minus1' WHERE id='$id'");
  echo "<script>window.open('cart.php','_self')</script>";
  }
}

$sql=mysqli_query($con,"SELECT * FROM cart WHERE userid = '$_SESSION[userid]'");
$row3=mysqli_num_rows($sql);
if($row3==0){
  echo "<script>alert('Opps! Cart Is Empty')</script>";
  echo "<script>window.open('wearhome.php','_self')</script>";
}
?>
<section class="vh-auto  my-5">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Shopping Cart </span></p>
        <?php 
        while($row=mysqli_fetch_assoc($sql)){
          $id = $row['id'];
          $proid = $row['proid'];
          $sql2= mysqli_query($con,"SELECT * FROM product WHERE id = '$proid'");
          $row2=mysqli_fetch_assoc($sql2);
        ?>
        <div class="card mb-4"  style="background-color: #fdccbc;">
          <div class="card-body p-4">

            <div class="row align-items-center">
              <div class="col-sm">
                <a href="productdetail.php?proid=<?=$proid;?>"><img src="<?=PRODUCT_IMAGE_SITE_PATH.$row2['image'];?>" class="img-fluid" alt="Generic placeholder image"></a>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <p class="mb-4 pb-2">Name</p>
                  <p class="lead fw-normal mb-0"><?=$row2['name'];?></p>
                </div>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <p class="mb-4 pb-2">Quantity</p>
                  <p class="lead fw-normal mb-0"> <a class="badge badge-primary" href="?op=plus&id=<?=$id;?>"><i class="fa fa-plus"></i></a> <?=$row['qty'];?> <a class="badge badge-primary" href="?op=minus&id=<?=$id;?>"><i class="fa fa-minus"></i></a> </p>
                </div>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <p class="mb-4 pb-2">Size</p>
                  <p class="lead fw-normal mb-0"><?=$row['size'];?></p>
                </div>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <p class="mb-4 pb-2">Price</p>
                  <p class="lead fw-normal mb-0"><i class="fa fa-rupee"></i><?=$row2['price'];?></p>
                </div>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <?php
                  $total = $row['qty'] * $row2['price'];
                  ?>
                  <p class="mb-4 pb-2">Total</p>
                  <p class="lead fw-normal mb-0"><i class="fa fa-rupee"></i><?=$total;?></p>
                </div>
              </div>
              <div class="col-sm d-flex justify-content-center">
                <div>
                  <p class="mb-4 pb-2">Operation</p>
                  <p class="lead fw-normal mb-0"><a href="?delete&id=<?=$id;?>"><i class="fa fa-trash"></a></i></p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <?php
        $total2 = $total2 + $total; 
        } 
        ?>
        <div class="card mb-5"  style="background-color: #fdccbc;">
          <div class="card-body p-4">

            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="me-2">Order total: </span> <span class="lead fw-normal ml-2"><i class="fa fa-rupee"></i><?=$total2?></span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <a href="wearhome.php" class="btn btn-light btn-lg me-2">Continue shopping</a>
          <a href="checkout.php" class="btn btn-primary btn-lg me-2">CHECKOUT</a>
        </div>

      </div>
    </div>
  </div>
</section>
<?php require('productfooter.php'); ?>
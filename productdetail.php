<?php
require('producttop.php');
$userid = $_SESSION['userid'];
$proid = $_REQUEST['proid'];
$result = mysqli_query($con,"SELECT * FROM product WHERE id = $proid");
$data = mysqli_fetch_assoc($result);
?>
<main class="prcontainer">
    <div class="pack">
        <div class="left-column1">
            <img src="<?= PRODUCT_IMAGE_SITE_PATH.$data["image"]?>" alt="hello">
        </div>
    </div>
    <div class="right-column1">
        <div class="product-description">
            <span><?= $data["short_desc"]; ?></span>
            <h3><?= $data["name"]; ?></h3>
            <p><?= $data["description"]; ?></p>
            <span><strong>Avaibility: In Stock</strong></span>
        </div>
        <form method="POST" action="validate.php">
        <div class="product-price">
            <input type="hidden" name="proid" value="<?=$proid;?>">
            <input type="hidden" name="userid" value="<?=$userid;?>">
            <span><i class="fa fa-rupee fa-fw"></i><?= $data["price"]; ?></span><br>
            <div class="row">
            <select id=qty name="qty" class="col-sm rounded mx-1 p-2 form-select bg-dark text-white " required>
           <option value="">SELECT QUANTITY</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
            </select>
            <select class="col-sm rounded mx-1 p-2 form-select bg-dark text-white" name="size" required>
                <option value="">SELECT SIZE</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
            </div>
            <input type="submit" name="addtocart" class="my-1 cart-btn-pd form-control text-center he" value="Add to Cart">
        </div>
        </form>
    </div>
</main>

<?php require('productfooter.php'); ?>
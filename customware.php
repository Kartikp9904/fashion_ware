<?php require('producttop.php'); ?>
        <div class="banner">
            <div class="banner-im">
                <img src="images/banner.jpg" alt="">
            </div>
            <div class="banner-tittle">
                <h1>FASHION LIFE</h1>
                <h1>CUSTOM LIFESTYLE</h1>
            </div>
        </div>
    </section>
    <section class="fashion-trends">
    <div class="container">
            <div class="fashion-box">
                <div class="tittle-style text-center">
                    <h1>Create Your Own Design</h1>
                </div>
            </div>
            <div class="row">
                <?php
                $sql2="select * from product where categories_id = '13' && status = '1' ";
                $res2=mysqli_query($con,$sql2);
                while($row2=mysqli_fetch_assoc($res2)){
                ?>
                <div class="col-md-4">
                <h4><?php echo $row2['name']; ?></h4>  
                <div class="trending-img">
                      <img class="img-height" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row2['image']?>" alt="">
                      <button type="button" class="btn-buy"><a <?php if(isset($_SESSION["userid"])){ echo "href='customproductdetail.php?proid=$row2[id]&userid=$row[id]'";} else { echo "href='index.php#login'"; } ?> >Create Now</a></button>
                      <div class="overlay"></div>
                  </div>
                </div>
                <?php            
                } 
            ?> 
            </div>
        </div>
    </section>
    <?php require('productfooter.php'); ?>

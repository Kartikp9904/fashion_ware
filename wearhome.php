<?php require('producttop.php'); ?>
    <div class="banner">
            <div class="banner-im">
                <img src="images/banner3.jpg" alt="">
            </div>
            <div class="banner-tittle">
                <h1>FASHION LIFE</h1>
                <h1>MEN'S & WOMEN'S <br> LIFESTYLE</h1>
            </div>
        </div>
    <section class="fashion-trends">
        <div class="container">
            <div class="fashion-box">
                <div class="tittle-style text-center">
                    <h1>fashion trends</h1>
                </div>
            </div>
            <div class="row">
                <?php
                $sql2="select * from product where status = '1'";
                $res2=mysqli_query($con,$sql2);
                while($row2=mysqli_fetch_assoc($res2)){
                ?>
                <div class="col-md-4">
                  <div class="trending-img">
                      <img class="img-height" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row2['image']?>" alt="">
                      <button type="button" class="btn-buy"><a <?php if(isset($_SESSION["userid"])){ echo "href='productdetail.php?proid=$row2[id]&userid=$row[id]'";} else { echo "href='index.php#login'"; } ?> >buy now </a></button>
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
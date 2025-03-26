<?php require('producttop.php'); 
    $fabric = '';
    $proid = $_REQUEST['proid'];
    
if(isset($_POST['fabrictosleeve'])){
    $fabric=$_POST['fabric'];
    $sql3=mysqli_query($con,"SELECT * FROM fabric WHERE `name`='$fabric'");
    $row3=mysqli_fetch_assoc($sql3);
    $GLOBALS['fabid'] = $row3['id'];
    $sql5=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]' AND proid = '$proid'");
    if(mysqli_num_rows($sql5) > 0 ){
        $sql6=mysqli_query($con,"UPDATE temporder SET `cloth`='$fabid'");
        echo "<script>window.open('#sleeve','_self')</script>";
    }else{
    $sql4=mysqli_query($con,"INSERT INTO `temporder`(`userid`,`proid`,`cloth`,`sleeve`,`collar`) VALUES ('$_SESSION[userid]','$proid','$fabid',0,0)");
    echo "<script>window.open('#sleeve','_self')</script>";
    }
}
if(isset($_POST['sleevetocollar'])){
    $sleeve=$_POST['sleeve'];
    $sql5=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]' AND proid = '$proid'");
    $row3=mysqli_fetch_assoc($sql5);
    $fabid = $row3['cloth'];
    $sql8=mysqli_query($con,"SELECT * FROM subpart WHERE fabricid = '$fabid' AND pname = '$sleeve'");
    $row8=mysqli_fetch_assoc($sql8);
    $sleeveid = $row8['id'];
    $sql4=mysqli_query($con,"UPDATE temporder SET `sleeve`='$sleeveid' WHERE userid = '$_SESSION[userid]' AND proid = '$proid' AND cloth ='$fabid'");
    echo "<script>window.open('#collar','_self')</script>";
}
if(isset($_POST['collartocuff'])){
    $collar=$_POST['collar'];
    $sql5=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]' AND proid = '$proid'");
    $row3=mysqli_fetch_assoc($sql5);
    $fabid = $row3['cloth'];
    $sleeve = $row3['sleeve'];
    $sql8=mysqli_query($con,"SELECT * FROM subpart WHERE fabricid = '$fabid' AND pname = '$collar'");
    $row8=mysqli_fetch_assoc($sql8);
    $collarid = $row8['id'];
    $sql4=mysqli_query($con,"UPDATE temporder SET `collar`='$collarid' WHERE userid = '$_SESSION[userid]' AND proid = '$proid' AND cloth ='$fabid' ");
    echo "<script>window.open('#cuff','_self')</script>";
}
if(isset($_POST['ckeckout'])){
    $cuff=$_POST['cuff'];
    $sql5=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]' AND proid = '$proid'");
    $row3=mysqli_fetch_assoc($sql5);
    $fabid = $row3['cloth'];
    $sleeve = $row3['sleeve'];
    $sql8=mysqli_query($con,"SELECT * FROM subpart WHERE fabricid = '$fabid' AND pname = '$cuff'");
    $row8=mysqli_fetch_assoc($sql8);
    $cuffid = $row8['id'];
    $sql4=mysqli_query($con,"UPDATE temporder SET `cuff`='$cuffid' WHERE userid = '$_SESSION[userid]' AND proid = '$proid' AND cloth ='$fabid' ");
    echo "<script>window.open('customcheckout.php','_self')</script>";
}

    $sql2="select * from product where categories_id = '13' && status = '1' ";
    $res2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($res2);           
?>

<main class="images">
    <div class="left-column">
        <div class="slider">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row2['image']?>" alt="hello">
        </div>
        <h3>NAME:- <span class="result"><?=$fabric; ?></span></h3>
    </div>
    <div class="right-column">
        <div class="product-detail">
            <h3 class="text-center">Custom Stiching</h3>
            <br>
            <div class="d-flex overflow-hidden">
                <form method="POST" action="">
                    <section id="fabric">
                        <span><h5 class="ml-3">CLOTH TYPE</h5></span>
                        <div class="scrollable">
                            <div class="thumbnail">
                                <?php 
                                $sql="SELECT * FROM fabric WHERE `status` = 1";
                                $res=mysqli_query($con,$sql);
                                while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <div class="thumb">
                                    <label class="label-item p-1" for="<?php echo $row['name']; ?>"><img class="img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']; ?>"></label>
                                    <input type="radio" class="radio_item" id="<?php echo $row['name']; ?>" name="fabric" value="<?php echo $row['name']; ?>" required/>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <input type="submit" class="form-control bg-primary text-white" name="fabrictosleeve" value="NEXT">
                    </section>
                </form>
                <form method="POST" action="">
                    <section id="sleeve">
                        <span><h5 class="ml-3">SLEEVE</h5></span>
                        <div class="scrollable">
                            <div class="thumbnail">
                                <?php
                                $sql2="SELECT * FROM subpart WHERE partname = 'SLEEVE' AND fabricid = '$fabid' AND `status` = 1";
                                $res2=mysqli_query($con,$sql2);
                                while($row2=mysqli_fetch_assoc($res2)){
                                ?>
                                <div class="thumb">
                                    <label class="label-item p-1" for="<?php echo $row2['pname']; ?>"><img class="img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row2['image']; ?>"></label>
                                    <input type="radio" class="radio_item" id="<?php echo $row2['pname']; ?>" name="sleeve" value="<?php echo $row2['pname']; ?>" required/>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="form-control bg-primary text-center text-decoration-none text-white" href="#fabric">PREVIOUS</a>
                            <input type="submit" class="form-control bg-primary text-white" name="sleevetocollar" value="NEXT">
                        </div>
                    </section>
                </form>
                <form method="POST" action="">
                    <section id="collar">
                        <span><h5 class="ml-3">COLLAR</h5></span>
                        <div class="scrollable">
                            <div class="thumbnail">
                                <?php
                                $sql9="SELECT * FROM subpart WHERE partname = 'COLLAR' AND fabricid = '$fabid' AND `status` = 1";
                                $res9=mysqli_query($con,$sql9);
                                while($row9=mysqli_fetch_assoc($res9)){
                                ?>
                                <div class="thumb">
                                    <label class="label-item p-1" for="<?php echo $row9['pname']; ?>"><img class="img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row9['image']; ?>"></label>
                                    <input type="radio" class="radio_item" id="<?php echo $row9['pname']; ?>" name="collar" value="<?php echo $row9['pname']; ?>" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="form-control bg-primary text-center text-decoration-none text-white" href="#sleeve">PREVIOUS</a>
                            <input type="submit" class="form-control bg-primary text-white" name="collartocuff" value="NEXT">
                        </div>
                    </section>
                </form>
                <form method="POST" action="">
                    <?php
                    $sql10=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]' AND proid='$proid'");
                    $row10=mysqli_fetch_assoc($sql10);
                    $sleevehf=$row10['sleeve'];
                    $sql11=mysqli_query($con,"SELECT * FROM subpart WHERE id = '$sleevehf'");
                    $row11=mysqli_fetch_assoc($sql11);
                    $check = $row11['pname'];

                    ?>
                    <section id="cuff">
                        <?php
                        if($check!='HALF SLEEVE'){
                        ?>
                        <span><h5 class="ml-3">CUFF</h5></span>
                        <div class="scrollable">
                            <div class="thumbnail">
                                <?php
                                $sql7="SELECT * FROM subpart WHERE partname = 'CUFF' AND fabricid = '$fabid' AND `status` = 1";
                                $res7=mysqli_query($con,$sql7);
                                while($row7=mysqli_fetch_assoc($res7)){
                                ?>
                                <div class="thumb">
                                    <label class="label-item p-1" for="<?php echo $row7['pname']; ?>"><img class="img-responsive" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row7['image']; ?>"></label>
                                    <input type="radio" class="radio_item" id="<?php echo $row7['pname']; ?>" name="cuff" value="<?php echo $row7['pname']; ?>" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a class="form-control bg-primary text-center text-decoration-none text-white" href="#collar">PREVIOUS</a>
                            <input type="submit" class="form-control bg-primary text-white" name="ckeckout" value="ORDER">
                        </div>
                        <?php
                        }else{
                            echo "
                            <span><h5 class='ml-3'>CUFF</h5></span>
                            <div class='scrollable'>
                            If You Want Cuff Plz Select Full Sleeve
                            <input type='hidden' name='cuff' value='0'/>
                            </div>
                            "; 
                        ?>
                        <div class="d-flex">
                            <a class="form-control bg-primary text-center text-decoration-none text-white" href="#collar">PREVIOUS</a>
                            <input type="submit" class="form-control bg-primary text-white" name="ckeckout" value="ORDER">
                        </div>
                        <?php } ?>
                    </section>
                </form>
            </div>
        </div>
    </div>
</main>
    <script>
    $('input[type=radio]').click(function(e) {
        var fabric = $(this).val(); 
        $('.result').html(fabric);	
    });
</script>
    <script>
        const thumbs = document.querySelectorAll('.thumb');
        const slider = document.querySelector('.slider');
        function changeImage(){
            slider.getElementsByTagName('img')[0].src = this.getElementsByTagName('img')[0].src;
        }
        thumbs.forEach(thumb => thumb.addEventListener('click', changeImage));
    </script>
    </body>
    </html>
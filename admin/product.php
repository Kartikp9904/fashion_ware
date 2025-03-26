<?php
require('top.php');
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
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				   <h4 class="box-link"><a class="add-pc-btn" href="manage_product.php">Add Product</a></h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">SR. No.</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Image</th>
							   <th>Price</th>
							   <th>Qty</th>
							   <th>Status</th>
							   <th>Operation</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['categories']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['price']?></td>
							   <td><?php echo $row['qty']?></td>
							   <td>
                                   <?php 
                                       if($row['status']==0){
                                           echo "Deactive";
                                       }else{
                                        echo "Active";                               
                                       }
                                    ?>
                                </td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span><a class='badge badge-pending' href='?type=status&operation=deactive&id=".$row['id']."'>Deactivate</a></span>&nbsp;";
								}else{
									echo "<span><a class='badge badge-complete' href='?type=status&operation=active&id=".$row['id']."'>Activate</a></span>&nbsp;";
								}
								echo "<span><a class='badge badge-edit' href='manage_product.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span><a  class='badge badge-delete' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>
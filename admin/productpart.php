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
		$update_status_sql="update fabric set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from fabric where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

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
		$update_status_sql="update subpart set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from subpart where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql1="select * from fabric order by id desc";
$res1=mysqli_query($con,$sql1);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   	<h4 class="box-title">Fabric</h4>
				   	<div class="d-flex flex-row bd-highlight mb-2">
				   	<h4 class="box-link mr-1"><a class="add-pc-btn" href="manage_productparts.php?f=fabric">Add Fabric</a></h4>
					</div>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>FABRIC</th>
							   <th>IMAGE</th>
							   <th>PRICE</th>
							   <th>Status</th>
							   <th>Operation</th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							while($row1=mysqli_fetch_assoc($res1)){?>
							<tr>
							   <td><?php echo $row1['id']?></td>
							   <td><?php echo $row1['name']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row1['image']?>"/></td>
							   <td><?php echo $row1['price']?></td>
							   <td>
                                   <?php 
                                       if($row1['status']==0){
                                           echo "Deactive";
                                       }else{
                                        echo "Active";                               
                                       }
                                    ?>
                                </td>
							   <td>
								<?php
								if($row1['status']==1){
									echo "<span><a class='badge badge-pending' href='?type=status&operation=deactive&id=".$row1['id']."'>Deactivate</a></span>&nbsp;";
								}else{
									echo "<span><a class='badge badge-complete' href='?type=status&operation=active&id=".$row1['id']."'>Activate</a></span>&nbsp;";
								}								
								echo "<span><a  class='badge badge-delete' href='?type=delete&id=".$row1['id']."'>Delete</a></span>";
								
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
	<?php
	$sql1="select subpart.*,fabric.name from subpart,fabric where subpart.fabricid=fabric.id order by subpart.id desc";
	$res1=mysqli_query($con,$sql1);
	?>
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   	<h4 class="box-title">Product Parts </h4>
				   	<div class="d-flex flex-row bd-highlight mb-2">
				   	<h4 class="box-link mr-1"><a class="add-pc-btn" href="manage_productparts.php?f=subpart">Add Part</a></h4>
					</div>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>ID</th>
							   <th>TYPE</th>
							   <th>PARTS</th>
							   <th>NAME</th>
                               <th>IMAGE</th>
							   <th>PRICE</th>
							   <th>Status</th>
							   <th>Operation</th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							while($row1=mysqli_fetch_assoc($res1)){?>
							<tr>
							   <td><?php echo $row1['id']?></td>
							   <td><?php echo $row1['name']?></td>
							   <td><?php echo $row1['partname']?></td>
							   <td><?php echo $row1['pname']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row1['image']?>"/></td>
							   <td><?php echo $row1['price']?></td>
							   <td>
                                   <?php 
                                       if($row1['status']==0){
                                           echo "Deactive";
                                       }else{
                                        echo "Active";                               
                                       }
                                    ?>
                                </td>
							   <td>
								<?php
								if($row1['status']==1){
									echo "<span><a class='badge badge-pending' href='?type=status&operation=deactive&id=".$row1['id']."'>Deactivate</a></span>&nbsp;";
								}else{
									echo "<span><a class='badge badge-complete' href='?type=status&operation=active&id=".$row1['id']."'>Activate</a></span>&nbsp;";
								}								
								echo "<span><a  class='badge badge-delete' href='?type=delete&id=".$row1['id']."'>Delete</a></span>";
								
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
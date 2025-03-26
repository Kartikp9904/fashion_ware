<?php
require('top.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='complete'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="UPDATE orders SET delivery_status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='paystatus'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='complete'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="UPDATE orders SET payment_status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}

	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql=mysqli_query($con,"DELETE FROM orders WHERE order_id='$id'");
		$delete_sql2=mysqli_query($con,"DELETE FROM order_products WHERE order_id ='$id'");
		$delete_sql2=mysqli_query($con,"DELETE FROM order_customproduct WHERE order_id ='$id'");
		$delete_sql3=mysqli_query($con,"DELETE FROM orders_info WHERE order_id='$id'");
	}
}

$sql="SELECT * FROM orders ORDER BY ID DESC";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">SR. No.</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Product Count</th>
							   <th>Transaction ID</th>
							   <th>Payment Status</th>
							   <th>Delivery</th>
							   <th>Operation</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i++?></td>
							   <td><?= $row['order_id'];?></td>
                               <?php $sql2=mysqli_query($con,"SELECT `fname` FROM users WHERE id = '$row[user_id]'"); $row2=mysqli_fetch_assoc($sql2);  ?>
							   <td><?= $row2['fname'];?></td>
							   <td><?= $row['qty'];?></td>
                               <?php if($row['tranid']=='0'){ $tranid = 'COD';}else{$tranid = $row['tranid']; } ?>
							   <td><?= $tranid;?></td>
                               <?php if($row['payment_status']=='0'){ $payment_status = 'Pending';}else{$payment_status = 'Complete'; } ?>
							   <td><?=$payment_status;?></td>
							   <td>
                                   <?php 
                                       if($row['delivery_status']==0){
                                           echo "Pending";
                                       }else{
                                        echo "Complete";                               
                                       }
                                    ?>
                                </td>
							   <td>
								<?php
                                    if($row['payment_status']==1){
                                        echo "<span><a class='badge badge-pending' href='?type=paystatus&operation=pending&id=".$row['id']."'>P-Pending</a></span>&nbsp;";
                                    }else{
                                        echo "<span><a class='badge badge-complete' href='?type=paystatus&operation=complete&id=".$row['id']."'>P-Complete</a></span>&nbsp;";
                                    }
								if($row['delivery_status']==1){
									echo "<span><a class='badge badge-pending' href='?type=status&operation=pending&id=".$row['id']."'>D-Pending</a></span>&nbsp;";
								}else{
									echo "<span><a class='badge badge-complete' href='?type=status&operation=complete&id=".$row['id']."'>D-Complete</a></span>&nbsp;";
								}								
								echo "<span><a  class='badge badge-delete' href='?type=delete&id=".$row['order_id']."'>Delete</a></span>";
								
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
<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function fabric(){
	echo"
	<div class='card-header'><strong>Product</strong><small> Form</small></div>
	<form method='post' enctype='multipart/form-data'>
		<div class='card-body card-block'>	
			<div class='form-group'>
				<label for='categories' class=' form-control-label'>Fabric Name</label>
				<input type='text' name='name' placeholder='Enter product name' class='form-control text-uppercase black-color' required>
			</div>
			
			<div class='form-group'>
				<label for='categories' class=' form-control-label'>Image</label>
				<input type='file' name='image' class='form-control' required>
			</div>
			<div class='form-group'>
				<label for='categories' class=' form-control-label'>Fabric Price</label>
				<input type='text' name='price' placeholder='Enter product price' class='form-control text-uppercase' required>
			</div>
			   <button id='payment-button' name='fabricsubmit' type='submit' class='btn btn-lg btn-info btn-block'>
				   <span id='payment-button-amount'>Submit</span>
			   </button>
		</div>
	</form>
</div>
	";
}

function subpart(){;
$con=mysqli_connect("localhost","root","","newcode");
    $res1=mysqli_query($con,"SELECT * FROM fabric");
	echo"
	<div class='card-header'><strong>Sub Product</strong><small> Form</small></div>
	<form method='post' enctype='multipart/form-data'>
		<div class='card-body card-block'>
		<div class='form-group'>
		<label for='subpart' class='form-control-label'>Fabric</label>
		<select name='fabricid' id='subpart' class='form-control'>
			<option value=''>--SELECT OPTION--</option>";
			while($row=mysqli_fetch_assoc($res1)){
				echo"
			  <option value=".$row['id'].">".$row['name'];".</option>";
			 }
echo "
		</select>
	</div>
			<div class='form-group'>
				<label for='subpart' class=' form-control-label'>Sub Part</label>
				<select name='parts' id='subpart' class='form-control'>
					<option value=''>--SELECT OPTION--</option>
  					<option value='SLEEVE'>SLEEVE</option>
  					<option value='COLLAR'>COLLAR</option>
  					<option value='CUFF'>CUFF</option>
				</select>
			</div>
			<div class='form-group'>
			<label for='name' class='form-control-label'>Sub Part Name</label>
			<input type='text' name='name' id='name' placeholder='Enter Sub Part' class='form-control' required>
		</div>
			<div class='form-group'>
				<label for='images' class='form-control-label'>Image</label>
				<input type='file' id='images' name='image' class='form-control' required>
			</div>
			<div class='form-group'>
				<label for='price' class='form-control-label'>Part Price</label>
				<input type='text' id='price' name='price' placeholder='Enter Part Price' class='form-control' required>
			</div>
			   <button id='payment-button' name='subpartsubmit' type='submit' class='btn btn-lg btn-info btn-block'>
				   <span id='payment-button-amount'>Submit</span>
			   </button>
		</div>
	</form>
</div>

	";
}

function mangepart(){
$con=mysqli_connect("localhost","root","","newcode");
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
}
?>
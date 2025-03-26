<?php require('producttop.php'); 


$total2="0";
$sql=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$_SESSION[userid]'");
$row=mysqli_fetch_assoc($sql);
$row4=mysqli_num_rows($sql);
?>
<form class="needs-validation" method="POST" action="validate.php" novalidate>
    <div class="container my-5">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your Order</span>
                        <span class="badge bg-primary rounded-pill"><?=$row4;?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        $id = $row['id'];
                        $proid = $row['proid'];
                        $sql2= mysqli_query($con,"SELECT * FROM product WHERE id = '$proid'");
                        $row2=mysqli_fetch_assoc($sql2);
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?=$row2['name'];?></h6>
                                <?php
                                $sql3=mysqli_query($con,"SELECT * FROM fabric WHERE id = '$row[cloth]'");
                                $row5=mysqli_fetch_assoc($sql3);
                                $sql4=mysqli_query($con,"SELECT * FROM subpart WHERE id = '$row[sleeve]'");
                                $row6=mysqli_fetch_assoc($sql4);
                                $sql5=mysqli_query($con,"SELECT * FROM subpart WHERE id = '$row[collar]'");
                                $row7=mysqli_fetch_assoc($sql5);
                                if($row['cuff']==0){
                                    $name = "0";
                                    $price = "0";
                                }else{
                                    $sql6=mysqli_query($con,"SELECT * FROM subpart WHERE id = '$row[cuff]'");
                                    $row8=mysqli_fetch_assoc($sql6);
                                    $cuffid = $row8['id']; 
                                    $name = $row8['pname'];
                                    $price = $row8['price'];
                                }
                                ?>
                                <small class="text-muted"><?=$row5['name'];?> <i class="fa fa-rupee"></i><?=$row5['price'];?></small>
                                <br/>
                                <small class="text-muted"><?=$row6['pname'];?> <i class="fa fa-rupee"></i><?=$row6['price'];?></small>
                                <br/>
                                <small class="text-muted"><?=$row7['pname'];?> <i class="fa fa-rupee"></i><?=$row7['price'];?></small>
                                <br/>
                                <?php if($row['cuff']==0){ 
                                }else{ ?>
                                <small class="text-muted"><?=$name;?> <i class="fa fa-rupee"></i><?=$price;?></small>
                                <?php } ?>
                            </div>
                            <span class="text-muted"><i class="fa fa-rupee"></i><?=$row2['price'];?></span>
                        </li>
                        <?php $total = $row2['price']+$row5['price']+$row6['price']+$row7['price']+$price; ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total <i class="fa fa-rupee"></i></span>
                            <strong><i class="fa fa-rupee"></i><?=$total?></strong>
                            <input type="hidden" name="total_count" value="<?=$row4;?>">
                            <input type="hidden" name="cloth" value="<?=$row5['id'];?>">
                            <input type="hidden" name="sleeve" value="<?=$row6['id'];?>">
                            <input type="hidden" name="collar" value="<?=$row7['id'];?>">
                            <input type="hidden" name="cuff" value="<?=$cuffid;?>">
                            <input type="hidden" name="total_price" value="<?=$total;?>">
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select form-control" id="state" name="state" required>
                                <option value="">Choose...</option>
                                <option>Gujarat</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">District</label>
                            <select class="form-select form-control" id="city" name="district" required>
                                <option value="">Choose...</option>
                                <option>Ahmedabad</option>
                                <option>Meshana</option>
                                <option>Sabarkantha</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select form-control" id="city" name="city" required>
                                <option value="">Choose...</option>
                                <option>Ahmedabad</option>
                                <option>Bapunagar</option>
                                <option>Naroda</option>
                                <option>Himmatnagar</option>
                                <option>Unjha</option>
                                <option>Visnagar</option>
                                <option>Idar</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" required>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h4 class="mb-3">Payment</h4>
                    <div class="my-3">
                        <div class="form-check">
                            <input id="cod" name="paymentmethod" type="radio" class="form-check-input" value="cod" onclick="cardform(0)" checked required>
                            <label class="form-check-label" for="cod">Cash On Delivery(COD)</label>
                        </div>  
                        <div class="form-check">
                            <input id="credit/debit" name="paymentmethod" type="radio" class="form-check-input" value="card" onclick="cardform(1)" required>
                            <label class="form-check-label" for="credit/debit">Credit/Debit card</label>
                        </div> 
                    </div>
                    <div class="row gy-3" id="cardform" style="display:none;">
                    <div class="col-md-12">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <div class="col-md-6">
                        <label for="cc-name" class="form-label">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" name="cardname" placeholder="">
                        <small class="text-muted">Full name as displayed on card</small>
                    </div>
                    <div class="col-md-6">
                        <label for="cc-number" class="form-label">Credit/Debit card number</label>
                        <input type="text" class="form-control" id="cc-number" name="cardnumber" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="cc-expiration" class="form-label">Expiration</label>
                        <input type="text" class="form-control" name="expdate" id="cc-expiration" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="cc-cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" name="cvv" placeholder="">
                    </div>
                </div>
                <hr class="my-4">
                <input class="w-100 btn btn-primary btn-lg" name="customcheckoutprocess" type="submit" value="Continue to Pay">
            </div>
        </div>
    </main>
</div>
</form>
<script>
  (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

function cardform(k){
  if(k==1){
    document.getElementById('cardform').style.display="flex";
    document.getElementById("cc-name").required = true;
    document.getElementById("cc-number").required = true;
    document.getElementById("expdate").required = true;
    document.getElementById("cc-cvv").required = true;


  }else{
    document.getElementById('cardform').style.display="none";
    document.getElementById("cc-name").required = false;
    document.getElementById("cc-number").required = false;
    document.getElementById("expdate").required = false;
    document.getElementById("cc-cvv").required = false;
    return;
  }
}
</script>
<?php require('productfooter.php'); ?>
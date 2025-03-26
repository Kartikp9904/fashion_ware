<?php require('producttop.php'); 
$total2="0";
$sql=mysqli_query($con,"SELECT * FROM cart WHERE userid = '$_SESSION[userid]'");
$row3=mysqli_num_rows($sql);
if($row3==0){
  echo "<script>window.open('wearhome.php','_self')</script>";
}
?>
 <form class="needs-validation" method="POST" action="validate.php">
<div class="container my-5">
  <main>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"><?=$row3;?></span>
          <input type="hidden" name="total_count" value="<?=$row3;?>">
        </h4>
        <ul class="list-group mb-3">
            <?php
                while($row=mysqli_fetch_assoc($sql)){
                    $id = $row['id'];
                    $proid = $row['proid'];
                    $sql2= mysqli_query($con,"SELECT * FROM product WHERE id = '$proid'");
                    $row2=mysqli_fetch_assoc($sql2);
            ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?=$row2['name'];?></h6>
          <input type="hidden" name="prod_id_" value="<?=$row2['id'];?>">

              <small class="text-muted"><?=$row2['short_desc'];?></small>
            </div>
            <span class="text-muted"><?=$row2['price'];?>*<?=$row['qty'];?></span>
          <input type="hidden" name="prod_price_" value="<?=$row2['price'];?>">
          <input type="hidden" name="prod_qty_" value="<?=$row['qty'];?>">

          </li>
          
          <?php 
          $total = $row2['price']*$row['qty'];
          $total2 = $total2 + $total; 
          } 
          ?>
         <li class="list-group-item d-flex justify-content-between">
            <span>Total <i class="fa fa-rupee"></i></span>
            <strong><i class="fa fa-rupee"></i><?=$total2?></strong>
          <input type="hidden" name="total_price" value="<?=$total2;?>">

          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
          <div class="row g-3">

          <div class="col-6">
              <label for="fullname" class="form-label">Full Name</label>
              <input type="text" class="form-control" title="Name must have First Letter Capital" pattern="[A-Za-z\s]{1,100}"  name="fullname" placeholder="Naruto Uzumaki" required>
            </div>

            
          <div class="col-6">
              <label for="email" class="form-label">E-mail</label>
              <?php $sql3=mysqli_query($con,"SELECT email FROM users WHERE id='$_SESSION[userid]'"); $row4=mysqli_fetch_assoc($sql3);?>
              <input type="text" class="form-control" id="email" name="email" value="<?=$row4['email'];?>" disabled required>
            </div>


            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="House No. / Apartment " name="address" required>
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
              <input type="text" class="form-control" id="zip" pattern="[0-9]{6}" maxlength="6" title="Plz Enter 6 Digit ZipCode" name="zipcode" placeholder="" required>
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
              <input type="text" class="form-control" pattern="[A-Za-z]{1-100}" id="cc-name" title="Plz Enter Card Name" name="cardname" placeholder="Naruto Uzumaki">
              <small class="text-muted">Full name as displayed on card</small>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit/Debit card number</label>
              <input type="text" class="form-control" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" maxlength="19" id="cc-number" title="Plz Enter Card Number As Shown" name="cardnumber" placeholder="56xx-xxxx-xxxx-xx47" required>
            </div>

            <div class="col-md-6">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" name="expdate" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" title="Plz Enter Expiration As Shown" id="cc-expiration" placeholder="12/25" required>

            </div>

            <div class="col-md-6">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" pattern="[0-9]{3}" maxlength="3" title="Plz Enter 3 Digit CVV" name="cvv" placeholder="123" required>

            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" name="checkoutprocess" type="submit">Continue to Pay</button>
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
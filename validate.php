<?php
    require('include/connect.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // ---------------------------------------Register Section---------------------------------
	if(isset($_POST['Register']))
    {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $email_status = 'notverifed';
        $pnumber = $_POST['pnumber'];
		$uname = $_POST['uname'];
        $realpass = $_POST['pass'];
		$pass = md5($_POST['pass']);
        $otpcode = rand(100000, 999999);
        $email_otp = $otpcode;

		$query = mysqli_query($con, "SELECT * FROM users WHERE uname='$uname'");
		if(mysqli_num_rows($query) > 0 ) 
        { //check if there is already an entry for that username
			echo "<script>alert('Sorry! Username Already Exists')</script>";
            echo "<script>window.open('index.php#register','_self')</script>";
        }
        else
        {
            $query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' ");
            if(mysqli_num_rows($query) >0 ){
                echo "<script>alert('Sorry! Email Already Exists')</script>";
                echo "<script>window.open('index.php#register','_self')</script>";
            }
            else{
                $sql = "insert into users(fname, email,email_status, pnumber, uname, pass, realpass, email_otp) values('$fname' , '$email' ,'$email_status', '$pnumber' , '$uname' , '$pass', '$realpass','$email_otp')";
                if(mysqli_query($con, $sql))
                {
                $_SESSION['regicheck'] = $uname;
                echo "<script>alert('Please Verify Your Mail')</script>";
                echo "<script>window.open('index.php#verify','_self')</script>";
                $query4=mysqli_query($con,"SELECT * FROM users WHERE uname = '$uname' ");
                $row2=mysqli_fetch_assoc($query4);
                require 'vendor/autoload.php';
                $mail = new PHPMailer(true);
                try 
                {
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP(true);                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'youremail@gmail.com';                     //SMTP username
                    $mail->Password   = 'emailpass';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('youremail@gmail.com', 'Fashion-Ware');
                    $mail->addAddress($email, $fname);     //Add a recipient
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Verify Email';
                    $mail->Body    = "Hey $name,<br/> Your OTP Is { $row2[email_otp] } ";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    }   catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    }
                    else
                    {
                        echo "error:" .mysqli_error($con);
                    }
                }
            }    
        }        
    
    // ---------------------------------------Login Section---------------------------------
    
    if(isset($_POST['signin']))
{
    $uname = $_POST['un_login'];
    $pass  =  $_POST['pass_login'];
    $pass = md5($pass);
    $query = mysqli_query($con,"SELECT * FROM users WHERE uname = '$uname' AND pass = '$pass' ");
    if(mysqli_num_rows($query) > 0 ) 
    {
        $row = mysqli_fetch_assoc($query);
        $userid = $row['id'];
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $uname;
        $query2 = mysqli_query($con,"SELECT * FROM users WHERE uname = '$uname' AND pass = '$pass' AND email_status = 'notverifed'");
        if(mysqli_num_rows($query2) > 0){
            unset($_SESSION["userid"]);
            unset($_SESSION["username"]);
            $_SESSION['sendid'] = $userid;
            $otpcode = rand(100000, 999999);
            $email_otp = $otpcode;
            $query3=mysqli_query($con,"UPDATE users SET email_otp = '$email_otp' WHERE id = '$userid'");
            echo "<script>alert('Please Verify Email')</script>";
            echo "<script>window.open('index.php#verify','_self')</script>";
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);
            try 
            {
                $mail->SMTPDebug = 2;                      //Enable verbose debug output
                $mail->isSMTP(true);                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'youremail@gmail.com';                     //SMTP username
                $mail->Password   = 'eamilpassword';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('youremail@gmail.com', 'Fashion-Ware');
                $mail->addAddress($row['email'], $row['name']);     //Add a recipient
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Verify Email';
                $mail->Body    = "Hey $name,<br/> Your OTP Is { $row[email_otp] } ";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
            }   catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
            
        }else{
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('wearhome.php','_self')</script>";
        }
    }
    else
    {
        echo "<script>alert('Username Or Password is Incorrect')</script>";
        echo "<script>window.open('index.php#login','_self')</script>";
    }
}

    // ---------------------------------------Forgot Pass Section---------------------------------

if(isset($_POST['forgotpass']))
{
    $email = $_POST['email'];
    $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($query);
    $username = $row['uname'];
    $userpass = $row['realpass'];
    if(mysqli_num_rows($query) > 0 ) 
    {
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try 
        {
            $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP(true);                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'youreamil@gmail.com';                     //SMTP username
            $mail->Password   = 'eamilpassword';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('youremail@gmail.com', 'Fashion-Ware');
            $mail->addAddress($email, $username);     //Add a recipient
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Account Recovery';
            $mail->Body    = "Hey $username,<br/> Your Password Is { $userpass } ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo "<script>alert('Your Password Is Sent To Your Email')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }   catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
    echo "<script>alert('Email is Incorrect')</script>";
    echo "<script>window.open('index.php#forgotpass','_self')</script>";
}
}

    // ---------------------------------------Verify Section---------------------------------

if(isset($_POST['verifyotp']))
{
    if(isset($_SESSION['after'])){
        $id = $_SESSION['sendid'];
    $otpcode = $_POST['verifycode'];
    $query = mysqli_query($con,"SELECT * FROM users WHERE id = '$id' AND email_otp = '$otpcode' ");
    $row = mysqli_fetch_assoc($query);
    $uname = $row['uname'];
    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['userid'] = $id;
        $_SESSION['username'] = $uname;
        unset($_SESSION['after']);
        $query2 = mysqli_query($con,"UPDATE users SET email_status = 'verifed' WHERE id ='$id'");
        unset($_SESSION['sendid']);
        echo "<script>alert('Login Succesfull')</script>";
        echo "<script>window.open('wearhome.php','_self')</script>";
    }else{
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        echo "<script>alert('Invalid OTP! Please Renter Details')</script>";
        echo "<script>window.open('index.php#login','_self')</script>";
    }
    }else if(isset($_SESSION['before'])){
        $id = $_SESSION['before'];
        $otpcode = $_POST['verifycode'];
        $query4 = mysqli_query($con,"SELECT * FROM users WHERE id = '$id' AND email_otp = '$otpcode' ");
        $row4 = mysqli_fetch_assoc($query4);
        $uname = $row4['uname'];
        if(mysqli_num_rows($query4) > 0)
        {
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $uname;
            unset($_SESSION['before']);
            $query2 = mysqli_query($con,"UPDATE users SET email_status = 'verifed' WHERE id ='$id'");
            echo "<script>alert('Login Succesfull')</script>";
            echo "<script>window.open('wearhome.php','_self')</script>";
        }else{
            unset($_SESSION['userid']);
            unset($_SESSION['username']);
            echo "<script>alert('Invalid OTP! Please Renter Details')</script>";
            echo "<script>window.open('index.php#login','_self')</script>";
        }
    }
}
 
//--------------------------------cart---------------------------->
if(isset($_POST['addtocart']))
{
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    $proid = $_POST['proid'];
    $userid = $_POST['userid'];
    $sql=mysqli_query($con,"SELECT * FROM cart WHERE userid = '$userid' AND proid = '$proid'");
    $row=mysqli_fetch_assoc($sql);
    $total = $qty + $row['qty'];
    if(mysqli_num_rows($sql) > 0)
    {
        if(empty($qty)){
            $sql4 = mysqli_query($con,"UPDATE cart SET size = '$size' WHERE userid ='$userid' AND proid = '$proid'");
            echo "<script>alert('Detail Updated Succesfull')</script>";
            echo "<script>window.open('productdetail.php?proid=".$proid."','_self')</script>";
        }elseif(empty($size)){
            $sql2 = mysqli_query($con,"UPDATE cart SET qty = '$total' WHERE userid ='$userid' AND proid = '$proid'");
            echo "<script>alert('Detail Updated Succesfull')</script>";
            echo "<script>window.open('productdetail.php?proid=".$proid."','_self')</script>";
        }else{
            $sql4 = mysqli_query($con,"UPDATE cart SET size = '$size' WHERE userid ='$userid' AND proid = '$proid'");
            $sql2 = mysqli_query($con,"UPDATE cart SET qty = '$total' WHERE userid ='$userid' AND proid = '$proid'");
            echo "<script>alert('Detail Updated Succesfull')</script>";
            echo "<script>window.open('productdetail.php?proid=".$proid."','_self')</script>";
        }
    }else{
    $sq3 = mysqli_query($con,"INSERT INTO cart (`proid`,`userid`,`qty`,`size`) VALUES ('$proid','$userid','$qty','$size')");
    echo "<script>alert('Product Added Succesfully')</script>";
    echo "<script>window.open('productdetail.php?proid=".$proid."','_self')</script>";
    } 
}

//--------------------------------CheckOut Process---------------------------->

if (isset($_POST['checkoutprocess'])) {

	$fullname = $_POST["fullname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $zipcode= $_POST['zipcode'];
    $paymentmethod = $_POST['paymentmethod'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardnumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
    $user_id=$_SESSION["userid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];

    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }
    if($paymentmethod=='card'){
	$sql = "INSERT INTO `orders_info`(`order_id`,`userid`,`fullname`, `email`,`address`, `state`,`district`,`city`, `zipcode`,`paymentmethod`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) VALUES ($order_id, '$user_id','$fullname','$email','$address', '$state', '$district', '$city', '$zipcode', '$paymentmethod','$cardname','$cardnumberstr','$expdate','$total_count','$prod_total','$cvv')";
    }else{
	$sql = "INSERT INTO `orders_info`(`order_id`,`userid`,`fullname`, `email`,`address`, `state`,`district`,`city`, `zipcode`,`paymentmethod`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) VALUES ($order_id, '$user_id','$fullname','$email','$address', '$state', '$district', '$city', '$zipcode', '$paymentmethod','-','-','-','$total_count','$prod_total','-')";
    }

    if(mysqli_query($con,$sql)){
        $i=1;
        $prod_id_=0;
        $prod_price_=0;
        $prod_qty_=0;
        
            $sql3=mysqli_query($con,"SELECT * FROM cart WHERE userid = '$user_id'");
            while($row3=mysqli_fetch_assoc($sql3)){
            $prod_id_ = $row3['proid'];	
            $sql4=mysqli_query($con,"SELECT price FROM product WHERE id = '$prod_id_'");
            $row4=mysqli_fetch_array($sql4);
            $prod_price_ = $row4['price'];
            $prod_qty_ = $row3['qty'];
            $prod_size_ = $row3['size'];
            $sub_total=(int)$prod_price_*(int)$prod_qty_;
            $sql1=mysqli_query($con,"INSERT INTO `order_products`(`order_pro_id`,`order_id`,`product_id`,`qty`,`size`,`amt`) VALUES (NULL, '$order_id','$prod_id_','$prod_qty_','$prod_size_','$sub_total')");
            }
            $del_sql=mysqli_query($con,"DELETE from cart where userid = $user_id");
            if($paymentmethod=='card'){
                $tranid = rand(000000000,999999999);
                $sql5=mysqli_query($con,"INSERT INTO `orders`(`order_id`,`user_id`,`qty`,`tranid`,`payment_status`,`delivery_status`) VALUES ('$order_id','$user_id','$total_count','$tranid',1,0)");
                }else{
                $sql5=mysqli_query($con,"INSERT INTO `orders`(`order_id`,`user_id`,`qty`,`tranid`,`payment_status`,`delivery_status`) VALUES ('$order_id','$user_id','$total_count','-',0,0)");
                }
                $query4=mysqli_query($con,"SELECT * FROM users WHERE id = '$_SESSION[userid]' ");
                $row5=mysqli_fetch_assoc($query4);
                $fname = $row5['fname'];
                $email = $row5['email'];
                require 'vendor/autoload.php';
                $mail = new PHPMailer(true);
                try 
                {
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP(true);                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'youremail@gmail.com';                     //SMTP username
                    $mail->Password   = 'emailpassword';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('youremail@gmail.com', 'Fashion-Ware');
                    $mail->addAddress($email, $fname);     //Add a recipient
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Thanks For Order';
                    $mail->Body    = "Hey $fname,<br/> Your Order Is Has Been Placed Within 3-4 Days Your Order Will Be Delivered <br/>";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    }   catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
            echo"<script>window.location.href='wearhome.php'</script>";
    }else{

        echo(mysqli_error($con));
        
    }
    
}

//--------------------------------Custom CheckOut Process---------------------------->

if (isset($_POST['customcheckoutprocess'])) {

	$fullname = $_POST["fullname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $zipcode= $_POST['zipcode'];
    $paymentmethod = $_POST['paymentmethod'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardnumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
    $user_id=$_SESSION["userid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $prod_total = $_POST['total_price'];
    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }
    if($paymentmethod=='card'){
	$sql = "INSERT INTO `orders_info`(`order_id`,`userid`,`fullname`, `email`,`address`, `state`,`district`,`city`, `zipcode`,`paymentmethod`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) VALUES ($order_id, '$user_id','$fullname','$email','$address', '$state', '$district', '$city', '$zipcode', '$paymentmethod','$cardname','$cardnumberstr','$expdate','$total_count','$prod_total','$cvv')";
    }else{
	$sql = "INSERT INTO `orders_info`(`order_id`,`userid`,`fullname`, `email`,`address`, `state`,`district`,`city`, `zipcode`,`paymentmethod`, `cardname`,`cardnumber`,`expdate`,`prod_count`,`total_amt`,`cvv`) VALUES ($order_id, '$user_id','$fullname','$email','$address', '$state', '$district', '$city', '$zipcode', '$paymentmethod','-','-','-','$total_count','$prod_total','-')";
    }

    if(mysqli_query($con,$sql)){
            $sql3=mysqli_query($con,"SELECT * FROM temporder WHERE userid = '$user_id'");
            $row3=mysqli_fetch_assoc($sql3);
            $prod_id_ = $row3['proid'];	
            $fabric = $row3['cloth'];
            $sleeve = $row3['sleeve'];
            $collar = $row3['collar'];
            $cuff = $row3['cuff'];
            $sql1=mysqli_query($con,"INSERT INTO `order_customproduct`(`order_id`, `product_id`, `cloth`, `sleeve`, `collar`, `cuff`, `amt`) VALUES ('$order_id','$prod_id_','$fabric','$sleeve','$collar','$cuff','$prod_total')");
            $del_sql=mysqli_query($con,"DELETE from temporder where userid = $user_id");
            if($paymentmethod=='card'){
                $tranid = rand(000000000,999999999);
                $sql5=mysqli_query($con,"INSERT INTO `orders`(`order_id`,`user_id`,`qty`,`tranid`,`payment_status`,`delivery_status`) VALUES ('$order_id','$user_id',1,'$tranid',1,0)");
                }else{
                $sql5=mysqli_query($con,"INSERT INTO `orders`(`order_id`,`user_id`,`qty`,`tranid`,`payment_status`,`delivery_status`) VALUES ('$order_id','$user_id',1,'-',0,0)");
                }
                $query4=mysqli_query($con,"SELECT * FROM users WHERE id = '$_SESSION[userid]' ");
                $row5=mysqli_fetch_assoc($query4);
                $fname = $row5['fname'];
                $email = $row5['email'];
                require 'vendor/autoload.php';
                $mail = new PHPMailer(true);
                try 
                {
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP(true);                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'youremail@gmail.com';                     //SMTP username
                    $mail->Password   = 'emailpassword';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('youremail@gmail.com', 'Fashion-Ware');
                    $mail->addAddress($email, $fname);     //Add a recipient
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Thanks For Order';
                    $mail->Body    = "Hey $fname,<br/> Your Order Is Has Been Placed Within 3-4 Days Your Order Will Be Delivered ";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    }   catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
            echo"<script>window.location.href='wearhome.php'</script>";
    }else{

        echo(mysqli_error($con));
        
    }
    
}
?>
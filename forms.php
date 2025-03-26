<section id="login">
            <div class="midlvl">
                <form method="post" action="validate.php">
                    <table>
                        <tr><td colspan="2"><h2>Welcome Back</h2></td></tr>
                        <tr>
                            <td>
                                <a class="linka txtcol" href="index.php#login">Sign In</a>     
                            </td>
                            <td>
                                <a class="linka txtcol" href="index.php#register">Sign Up</a>
                            </td>
                        </tr>
                            <tr><td colspan="2"></td><tr>
                        <tr><td colspan="2"><input class="input_color" type="text"  name="un_login" placeholder="User Name" required> </td></tr>
                        <tr><td colspan="2"><input class="input_color" type="password" name="pass_login" placeholder="Password" required></td></tr>
                        <tr><td colspan="2"><input  class="btn_color txtcol" type="submit" name="signin" value="Login" ></td></tr>
                        <tr><td colspan="2"> <a href="#forgotpass">Forgot Password ? </a></td></tr>
                    </table>
                </form>
            </div>
        </section>
        <section id="register">
            <div class="midlvl">
                <form method="post" action="validate.php">
                    <table>
                    <tr><td colspan="2"><h2>Welcome to Our World</h2></td></tr>
                        <tr>
                            <td>
                                <a class="linka txtcol" href="index.php#login">Sign In</a>
                            </td>
                            <td>
                                <a class="linka txtcol" href="index.php#register">Sign Up</a>
                            </td>
                        </tr>
                        <tr><td colspan="2"></td><tr> 
                        <tr><td colspan="2"><input class="input_color" type="text" pattern="[a-zA-Z]{1-50}" name="fname" placeholder="Name" required></td></tr>
                        <tr><td colspan="2"><input class="input_color" type="email" name="email" placeholder="Email"  required></td></tr>
                        <tr><td colspan="2"><input class="input_color" type="text" pattern="[0-9]{1-12}" name="pnumber" placeholder="Mobile Number" required></td></tr>
                        <tr><td colspan="2"><input class="input_color" type="text"  pattern="[a-zA-Z]{1-30}" name="uname" placeholder="Username"  required></td></tr>
                        <tr><td colspan="2"><input class="input_color" type="password" name="pass" placeholder="Password" required></td></tr>
                        <tr><td colspan="2"></td><tr>
                        <tr><td colspan="2"><input class="btn_color txtcol pointer" type="submit" name="Register" value="Register" required></td></tr>
                    </table>
                </form>
            </div>
        </section>
        <section id="forgotpass">
            <div class="midlvl">
                <form method="post" action="validate.php">
                    <table>
                        <tr><td colspan="2"><h2>Account Recovery</h2></td></tr>
                        <tr><td colspan="2"></td><tr>
                        <tr><td colspan="2"><input class="input_color" type="email"  name="email" placeholder="Email" required> </td></tr>
                        <tr><td colspan="2"><input  class="btn_color txtcol" type="submit" name="forgotpass" value="Continue" ></td></tr>
                    </table>
                </form>
            </div>
        </section>
        <section id="verify">
            <div class="midlvl">
                <?php
                if(isset($_SESSION['sendid'])){
                    $id = $_SESSION['sendid'];
                    $query = mysqli_query($con,"SELECT * FROM users WHERE id = '$id' ");
                    $row=mysqli_fetch_assoc($query);
                    $email = $row['email'];
                    $_SESSION['after'] = $id;
                }elseif(isset($_SESSION['regicheck'])){
                    $uname=$_SESSION['regicheck'];
                    $query2 = mysqli_query($con,"SELECT * FROM users WHERE uname = '$uname' ");
                    $row=mysqli_fetch_assoc($query2);
                    $id = $row['id'];
                    $email = $row['email'];
                    $_SESSION['before']= $id;
                }
                
                ?>
                <form method="post" action="validate.php">
                    <table>
                        <tr><td colspan="2"><h2>Verify Email</h2></td><td><input type='hidden' name='verid' value='<?php echo $id; ?>'> </td></tr>
                        <tr><td colspan="2"><input class="input_color" type="text"  name="email" value = "<?php echo $email; ?>" disabled> </td><tr>
                        <tr><td colspan="2"><input class="input_color" type="text"  name="verifycode" placeholder="OTP" required> </td></tr>
                        <tr><td colspan="2"><input  class="btn_color txtcol" type="submit" name="verifyotp" value="Continue" ></td></tr>
                    </table>
                </form>
            </div>
        </section>
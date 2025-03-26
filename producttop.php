<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <title>Fashion-Ware</title>
</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="index.php"><img src="images/3.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="wearhome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menswear.php">Mens Wear</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ladieswear.php">Ladies Wear</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customware.php">Custom Ware</a>
                    </li>
                </ul>
                <ul class="right-menu ml-auto">
                <?php
                             include "include/connect.php";
                            if(isset($_SESSION["userid"])){
                                $sql = "SELECT id , uname FROM users WHERE id ='$_SESSION[userid]' AND uname = '$_SESSION[username]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                echo "<li class='px-2 border-right border-dark'><a href='cart.php'><i class='fa fa-shopping-cart'></i>Cart</a></li> 
                                <li  class='px-2 border-right border-dark'><div class='dropdown '>
                                <a href='' class='dropdown-toggle active' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-user'></i>".$row['uname']."</a>
                                <div class='user-menu dropdown-menu'>
                                   <a class='nav-link' href='profile.php'><i class='fa fa-user-circle'></i> Profile</a>
                                   <a class='nav-link' href='logout.php'><i class='fa fa-power-off'></i>Logout</a>
                                   
                                </div>
                             </div></li>";
                            }else{ 
                                echo '<li class="px-2 border-right border-dark"><a href="index.php#login"><i class="fa fa-sign-in" aria-hidden="true"></i>Log In</a></li>';    
                            }
                        ?>
                <li class="px-2 border-right border-dark"><a href="index.php#service">Services</a></li>
                <li class="px-2"><a href="index.php#contact">Contact us</a></li>
                       
                </ul>
            </div>
        </nav>
    </section>
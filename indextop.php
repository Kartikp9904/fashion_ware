<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion-Ware</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container1">
        <nav class="navbar">
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#home"> <img  class="logo" src="./images/3.png" ></a></li>
                <li><a href="#contact">Contact</a></li>
                <?php
                             include "include/connect.php";
                            if(isset($_SESSION["userid"])){
                                $sql = "SELECT id , uname FROM users WHERE id ='$_SESSION[userid]' AND uname = '$_SESSION[username]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo "
                                <li class='left-bor-a'><div class='dropdown'>
                                <button onclick='myFunction()' class='dropbtn'><i class='fa fa-user-o fa-fw'></i>".$row['uname']."</button>
                                <div id='myDropdown' class='dropdown-content'>
                                  <a href='profile.php' style='font-size:18px;'><i class='fa fa-user-circle fa-fw'></i> Profile</a>
                                  <a href='logout.php' style='font-size:18px;'><i class='fa fa-power-off fa-fw'></i> Logout</a>
                                </div>
                              </div></li>
                                "; 
                            }else{ 
                                echo "<li><a href='index.php#login'><i class='fa fa-sign-in' aria-hidden='true'></i> Log In</a></li>";    
                            }
                        ?>
              </ul>
                    <script>
                    function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                    }
                    window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                        }
                    }
                    }
                    </script>
              
            </nav>
<?php

session_start();

unset($_SESSION["userid"]);

unset($_SESSION["username"]);

session_destroy();

    header('Location: index.php'); 
   

?>

<?php
session_start();
$con=mysqli_connect("localhost","root","","newcode");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/phpv/Fashion-Ware/');
define('SITE_PATH','http://localhost/phpv/Fashion-Ware/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
error_reporting(0);
?>
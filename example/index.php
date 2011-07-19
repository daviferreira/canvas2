<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_USER_NOTICE);
ini_set('display_errors','On');
ini_set('display_startup_errors', true);

require_once "../canvas.php";
$file = "test_image.png";

$canvas = new canvas($file);

$canvas->set_rgb('#df0d32')
       ->merge("test_image.jpg", array(200, 0))
       ->show();
         
exit;

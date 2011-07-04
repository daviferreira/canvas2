<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_USER_NOTICE);
ini_set( 'display_errors','On' );
ini_set('display_startup_errors',true);

include 'canvas.php';
$file ="../funfou_teaser/logo.jpg";

$canvas = new canvas($file);

$canvas->set_rgb('#df0d32')->resize("90%", "30%", 'fill');
#var_dump($canvas->error_message());
$canvas->show();

exit;
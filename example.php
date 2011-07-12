<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_USER_NOTICE);
ini_set( 'display_errors','On' );
ini_set('display_startup_errors',true);

require_once "canvas.php";
$file = "test_image.jpg";

$canvas = new canvas($file);

$canvas->set_rgb('#df0d32')
       ->resize("90%", "30%", 'fill');
      
$canvas->set_rgb(array(0, 0, 0))
       ->add_text("teste", array(
            "size" => 12,
            "x" => 0,
            "y" => 0,
            "truetype" => true,
            'font' => './almosnow.ttf',
         ));
         
//var_dump($canvas->error_message());
$canvas->show();

exit;

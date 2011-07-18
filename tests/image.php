<?php
include '../canvas.php';
$img = new canvas;
$img->create_empty_image(200, 200, $_GET["format"]);
$img->show();
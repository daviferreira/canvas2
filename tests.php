<?php
error_reporting(1);
require_once 'simpletest/autorun.php';
require_once 'canvas.php';

define('DIR', '/var/www/canvas2/');

class CanvasTest extends UnitTestCase {
  
  function test_construct_with_valid_image_file(){
    $img = new canvas(DIR."test_image.jpg");
    $this->assertFalse($img->error_message());
  }
  
  function test_construct_with_inexistent_file(){
    $img = new canvas("invalid.jpg");
    $this->assertEqual($img->error_message(), "File not accessible/found.");
  }
  
  function test_construct_with_non_image_file(){
    $file = DIR."example.php";
    $img = new canvas($file);
    $this->assertEqual($img->error_message(), "Invalid file. {$file} is not an image file.");
  }

  function test_load_valid_image_file(){
    $img = new canvas;
    $this->assertTrue($img->load(DIR."test_image.jpg"));
  }
  
  function test_load_inexistent_file(){
    $img = new canvas;
    $this->assertFalse($img->load("invalid.jpg"));
    $this->assertEqual($img->error_message(), "File not accessible/found.");
  }
  
  function test_load_with_non_image_file(){
    $file = DIR."example.php";
    $img = new canvas;
    $this->assertFalse($img->load($file));
    $this->assertEqual($img->error_message(), "Invalid file. {$file} is not an image file.");
  }
  
  function test_load_valid_image_url(){
    $url = "http://2.bp.blogspot.com/-hlz75VEq5Xo/TfzeXQkQe7I/AAAAAAAAAGg/rmcosBBuack/s1600/Event_12812_MainImage.jpg";
    $img = new canvas;
    $this->assertTrue($img->load_url($url));
  }
  
  function test_load_invalid_image_url(){
    $url = "http://www.globo.com";
    $img = new canvas;
    $this->assertFalse($img->load_url($url));
    $this->assertEqual($img->error_message(), "Invalid image URL.");
  }
  
  function test_create_empty_image_with_width_and_height(){
    $img = new canvas;
    $this->assertTrue($img->create_empty_image(200, 300) instanceof canvas);
  }
  
  function test_create_empty_image_with_only_width(){
    $img = new canvas;
    $this->assertFalse($img->create_empty_image(200));
  }
  
  function test_create_empty_image_with_only_height(){
    $img = new canvas;
    $this->assertFalse($img->create_empty_image(null, 200));
  }

}
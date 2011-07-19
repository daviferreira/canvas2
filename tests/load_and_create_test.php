<?php
class LoadAndCreateTest extends UnitTestCase {
  
  function test_construct_with_valid_jpeg_file(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertFalse($img->error_message());
  }
  
  function test_construct_with_valid_png_file(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertFalse($img->error_message());
  }

  function test_construct_with_valid_gif_file(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertFalse($img->error_message());
  }

  function test_construct_with_valid_bmp_file(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertFalse($img->error_message());
  }
  
  function test_construct_with_inexistent_file(){
    $img = new canvas("invalid.jpg");
    $this->assertEqual($img->error_message(), "File not accessible/found.");
  }
  
  function test_construct_with_non_image_file(){
    $file = dirname(__FILE__)."/../README.markdown";
    $img = new canvas($file);
    $this->assertEqual($img->error_message(), "Invalid file. {$file} is not an image file.");
  }

  function test_load_valid_jpeg_file(){
    $img = new canvas;
    $this->assertTrue($img->load(dirname(__FILE__)."/images/test_image.jpg"));
  }

  function test_load_valid_png_file(){
    $img = new canvas;
    $this->assertTrue($img->load(dirname(__FILE__)."/images/test_image.png"));
  }

  function test_load_valid_gif_file(){
    $img = new canvas;
    $this->assertTrue($img->load(dirname(__FILE__)."/images/test_image.gif"));
  }

  function test_load_valid_bmp_file(){
    $img = new canvas;
    $this->assertTrue($img->load(dirname(__FILE__)."/images/test_image.bmp"));
  }
  
  function test_load_inexistent_file(){
    $img = new canvas;
    $this->assertFalse($img->load("invalid.jpg"));
    $this->assertEqual($img->error_message(), "File not accessible/found.");
  }
  
  function test_load_with_non_image_file(){
    $file = dirname(__FILE__)."/../README.markdown";
    $img = new canvas;
    $this->assertFalse($img->load($file));
    $this->assertEqual($img->error_message(), "Invalid file. {$file} is not an image file.");
  }
  
  function test_load_valid_jpeg_url(){
    $url = "http://techdigest.tv/amazon-shipping-robot.jpg";
    $img = new canvas;
    $this->assertTrue($img->load_url($url));
  }

  function test_load_valid_png_url(){
    $url = "http://letsmakerobots.com/files/userpics/u345/robot.png";
    $img = new canvas;
    $this->assertTrue($img->load_url($url));
  }

  function test_load_valid_gif_url(){
    $url = "http://www.instructables.com/files/deriv/F6Y/3J1V/FIRJ6563/F6Y3J1VFIRJ6563.MEDIUM.gif";
    $img = new canvas;
    $this->assertTrue($img->load_url($url));
  }

  function test_load_valid_bmp_url(){
    $url = "http://www.righttime.com/images/other/robot.bmp";
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
  
  function test_create_empty_image_with_alpha(){
    $img = new canvas;
    $this->assertTrue($img->create_empty_image(200, 300, "png", 127) instanceof canvas);
  }

}

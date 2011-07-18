<?php
class ShowTest extends WebTestCase {

  function test_show_jpeg_image(){
    $this->assertTrue($this->get(BASE_URL.'tests/image.php?format=jpeg'));
    $this->assertHeader("Content-Type", "image/jpeg");
  }
  
  function test_show_jpg_image(){
    $this->assertTrue($this->get(BASE_URL.'tests/image.php?format=jpg'));
    $this->assertHeader("Content-Type", "image/jpg");
  }

  function test_show_png_image(){
    $this->assertTrue($this->get(BASE_URL.'tests/image.php?format=png'));
    $this->assertHeader("Content-Type", "image/png");
  }

  function test_show_gif_image(){
    $this->assertTrue($this->get(BASE_URL.'tests/image.php?format=gif'));
    $this->assertHeader("Content-Type", "image/gif");
  }

  function test_show_bmp_image(){
    $this->assertTrue($this->get(BASE_URL.'tests/image.php?format=bmp'));
    $this->assertHeader("Content-Type", "image/bmp");
  }

}
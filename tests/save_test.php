<?php
class SaveTest extends UnitTestCase {

  function test_save_jpeg_image(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $img->save("/tmp/test_image.jpg");
    $this->assertTrue(file_exists("/tmp/test_image.jpg"));
    @unlink("/tmp/test_image.jpg");
  }

  function test_save_png_image(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $img->save("/tmp/test_image.png");
    $this->assertTrue(file_exists("/tmp/test_image.png"));
    @unlink("/tmp/test_image.png");
  }

  function test_save_gif_image(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $img->save("/tmp/test_image.gif");
    $this->assertTrue(file_exists("/tmp/test_image.gif"));
    @unlink("/tmp/test_image.gif");
  }

  function test_save_bmp_image(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $img->save("/tmp/test_image.bmp");
    $this->assertTrue(file_exists("/tmp/test_image.bmp"));
    @unlink("/tmp/test_image.bmp");
  }

  function test_save_invalid_image(){
    $img = new canvas(dirname(__FILE__)."/../README.markdown");
    $this->assertFalse($img->save("/tmp/README.markdown"));
  }

}

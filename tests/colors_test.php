<?php
class ColorsTest extends UnitTestCase {
  
  function test_set_valid_rgb_color(){
    $img = new canvas;
    $this->assertTrue($img->set_rgb(255, 255, 255) instanceof canvas);
  }

  function test_set_valid_hex_color(){
    $img = new canvas;
    $this->assertTrue($img->set_rgb("#ffffff") instanceof canvas);
  }

  function test_set_valid_short_hex_color(){
    $img = new canvas;
    $this->assertTrue($img->set_rgb("#ccc") instanceof canvas);
  }
  
  function test_set_invalid_color(){
    $img = new canvas;
    $this->assertFalse($img->set_rgb("invalid_color"));
  }
  
}
<?php
class EffectsTest extends UnitTestCase {
  
  function __construct(){
    $this->img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
  }
  
  function test_horizontal_flip(){
    $this->assertTrue($this->img->flip() instanceof canvas);
    $this->assertTrue($this->img->flip("horizontal") instanceof canvas);
  }
  
  function test_vertical_flip(){
    $this->assertTrue($this->img->flip("vertical") instanceof canvas);
  }
  
  function test_invalid_flip(){
    $this->assertFalse($this->img->flip("invalid") instanceof canvas);
  }
  
  function test_image_rotate(){
    $this->assertTrue($this->img->rotate(90) instanceof canvas);
  }
  
  // filters
}
<?php
class TextTest extends UnitTestCase {
  
  function __construct(){
    $this->img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
  }
  
  function test_text_to_image(){
    $this->assertTrue($this->img->text("text") instanceof canvas);
  }

  function test_add_invalid_text_to_image(){
    $this->assertFalse($this->img->text("") instanceof canvas);
  }

  
  function test_add_truetype_text_to_image(){
    $options = array(
      "truetype" => true,
      "font" => "../example/almosnow.ttf"
    );
    //$this->assertTrue($this->img->text("text", $options) instanceof canvas);
  }
  
}
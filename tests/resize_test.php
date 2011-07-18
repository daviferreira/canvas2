<?php
class ResizeTest extends UnitTestCase {
  
  function test_set_valid_crop_coordinates(){
    $img = new canvas;
    $this->assertTrue($img->set_crop_coordinates(20, 30) instanceof canvas);
  }
  
  function test_resize_with_no_image(){
    $img = new canvas;
    $this->assertFalse($img->resize(200, 300, "crop"));
  }
  
  function test_jpeg_resize_with_width_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(200) instanceof canvas);
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.jpg");
  }
  
  function test_jpeg_resize_with_height_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(null, 200) instanceof canvas);    
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");
  }
  
  function test_jpeg_resize_with_width_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(200, null, "crop") instanceof canvas); 
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.jpg");  
  }
  
  function test_jpeg_resize_with_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(null, 200, "crop") instanceof canvas);        
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");
  }
  
  function test_jpeg_resize_with_widht_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(200, 200, "crop") instanceof canvas);
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");
  }
  
  function test_jpeg_resize_with_width_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(200, null, "fill") instanceof canvas);  
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.jpg");  
  }
  
  function test_jpeg_resize_with_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(null, 200, "fill") instanceof canvas);    
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");    
  }
  
  function test_jpeg_resize_with_widht_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertTrue($img->resize(200, 200, "fill") instanceof canvas);
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");
  }
  
  function test_jpeg_resize_with_width_no_width_and_height(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $this->assertFalse($img->resize());
    $this->assertEqual($img->error_message(), "Inform a new width and/or a new height.");
  }
  
  function test_png_resize_with_width_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(200) instanceof canvas);
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.png");
  }
  
  function test_png_resize_with_height_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(null, 200) instanceof canvas);    
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.png");
  }
  
  function test_png_resize_with_width_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(200, null, "crop") instanceof canvas); 
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.png");  
  }
  
  function test_png_resize_with_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(null, 200, "crop") instanceof canvas);        
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.png");
  }
  
  function test_png_resize_with_widht_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(200, 200, "crop") instanceof canvas);
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.png");
  }
  
  function test_png_resize_with_width_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(200, null, "fill") instanceof canvas);  
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.png");  
  }
  
  function test_png_resize_with_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(null, 200, "fill") instanceof canvas);    
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.png");    
  }
  
  function test_png_resize_with_widht_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertTrue($img->resize(200, 200, "fill") instanceof canvas);
    $img->save("/tmp/test_image.png");
    $imagesize = getimagesize("/tmp/test_image.png");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.png");
  }
  
  function test_png_resize_with_width_no_width_and_height(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.png");
    $this->assertFalse($img->resize());
    $this->assertEqual($img->error_message(), "Inform a new width and/or a new height.");
  }  
  
  function test_gif_resize_with_width_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(200) instanceof canvas);
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.gif");
  }
  
  function test_gif_resize_with_height_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(null, 200) instanceof canvas);    
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.gif");
  }
  
  function test_gif_resize_with_width_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(200, null, "crop") instanceof canvas); 
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.gif");  
  }
  
  function test_gif_resize_with_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(null, 200, "crop") instanceof canvas);        
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.gif");
  }
  
  function test_gif_resize_with_widht_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(200, 200, "crop") instanceof canvas);
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.gif");
  }
  
  function test_gif_resize_with_width_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(200, null, "fill") instanceof canvas);  
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.gif");  
  }
  
  function test_gif_resize_with_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(null, 200, "fill") instanceof canvas);    
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.gif");    
  }
  
  function test_gif_resize_with_widht_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertTrue($img->resize(200, 200, "fill") instanceof canvas);
    $img->save("/tmp/test_image.gif");
    $imagesize = getimagesize("/tmp/test_image.gif");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.gif");
  }
  
  function test_gif_resize_with_width_no_width_and_height(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.gif");
    $this->assertFalse($img->resize());
    $this->assertEqual($img->error_message(), "Inform a new width and/or a new height.");
  }
  
  function test_bmp_resize_with_width_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(200) instanceof canvas);
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.bmp");
  }
  
  function test_bmp_resize_with_height_only(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(null, 200) instanceof canvas);    
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.bmp");
  }
  
  function test_bmp_resize_with_width_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(200, null, "crop") instanceof canvas); 
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.bmp");  
  }
  
  function test_bmp_resize_with_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(null, 200, "crop") instanceof canvas);        
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.bmp");
  }
  
  function test_bmp_resize_with_widht_height_and_crop(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(200, 200, "crop") instanceof canvas);
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.bmp");
  }
  
  function test_bmp_resize_with_width_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(200, null, "fill") instanceof canvas);  
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.bmp");  
  }
  
  function test_bmp_resize_with_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(null, 200, "fill") instanceof canvas);    
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.bmp");    
  }
  
  function test_bmp_resize_with_widht_height_and_fill(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertTrue($img->resize(200, 200, "fill") instanceof canvas);
    $img->save("/tmp/test_image.bmp");
    $imagesize = getimagesize("/tmp/test_image.bmp");
    $this->assertEqual($imagesize[0], 200);
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.bmp");
  }
  
  function test_bmp_resize_with_width_no_width_and_height(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.bmp");
    $this->assertFalse($img->resize());
    $this->assertEqual($img->error_message(), "Inform a new width and/or a new height.");
  }

  function test_image_resize_with_width_proportion(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $img->resize("200");
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[1], 200);
    @unlink("/tmp/test_image.jpg");
  }

  function test_image_resize_with_height_proportion(){
    $img = new canvas(dirname(__FILE__)."/images/test_image.jpg");
    $img->resize(null, "200");
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 200);
    @unlink("/tmp/test_image.jpg");
  }

  function test_image_resize_with_percentual_width(){
    $img = new canvas;
    $img->create_empty_image(200, 200);
    $img->resize("30%");
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 60);
    @unlink("/tmp/test_image.jpg");

  }

  function test_image_resize_with_percentual_height(){
    $img = new canvas;
    $img->create_empty_image(200, 200);
    $img->resize("", "30%");
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[1], 60);
    @unlink("/tmp/test_image.jpg");
  }

  function test_image_resize_with_percentual_width_and_height(){
    $img = new canvas;
    $img->create_empty_image(200, 200);
    $img->resize("25%", "30%");
    $img->save("/tmp/test_image.jpg");
    $imagesize = getimagesize("/tmp/test_image.jpg");
    $this->assertEqual($imagesize[0], 50);
    $this->assertEqual($imagesize[1], 60);
    @unlink("/tmp/test_image.jpg");    
  }

}
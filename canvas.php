<?php
include 'imagecreatefrombmp.php';

class canvas{

  private $file, $image, $temp_image;

  private $width, $height, $new_width, $new_height, $html_size;

  private $format, $extension, $size, $basename, $dirname;

  private $rgb = array(255, 255, 255);
  
  private $quality = 100;

  private $crop_coordinates;

  private $error;
  
  private $image_formats = array(
    'jpeg' => 2,
    'jpg' => 2,
    'gif' => 1,
    'png' => 3,
    'bmp' => 6
  );

  public function __construct($file = null){
    if($file){
      $this->file = $file;
      $this->image_info();
    } 
  }

  public function load($file){
    $this->file = $file;
    $this->image_info();
    return $this;
  }
  
  public function load_url($url){
    $this->file = $url;
    $this->file_info();
    if(!$this->format){
      $this->error = "Invalid image URL.";
    }else{
      $this->create_image();
      $this->width = imagesx($this->image);
      $this->height = imagesy($this->image);
    }
    return $this;
  }

  private function image_info(){
    if(is_file($this->file)){
      $this->file_info();
      if(!$this->is_image())
        $this->error = "Invalid file. {$this->file} is not an image file.";
      else
        $this->create_image();
    }else{
      $this->error = "File not accessible/found.";
    }
  }

  private function dimensions(){
    list($this->width, $this->height, $this->html_size, $this->format) = getimagesize($this->file);
    return $this; 
  }

  private function file_info(){
    $pathinfo = pathinfo($this->file);
    $this->extension = strtolower($pathinfo['extension']);
    $this->basename = $pathinfo['basename'];
    $this->dirname = $pathinfo['dirname'];
    $this->format = $this->image_formats[$this->extension];
  }

  private function is_image(){
    $this->dimensions();
    if(!$this->format)
      return false;
    else
      return true;
  }

  public function create_empty_image($width, $height){
    $this->width = $width;
    $this->height = $height;
    $this->image = imagecreatetruecolor($this->width, $this->height);
    $background_color = imagecolorallocate($this->image, $this->rgb[0], $this->rgb[1], $this->rgb[2]);
    imagefill($this->image, 0, 0, $background_color);
    $this->extension = 'jpg';
    return $this;
  }

  private function create_image(){
    $extension = ($this->extension = 'jpg' ? 'jpeg' : $this->extension);
    $function_name = "imagecreatefrom{$extension}";

    if(function_exists($function_name))
      $this->image = $function_name($this->file);
    else
      $this->error = "Invalid image file or imagecreat function not enabled.";

    return $this;
  }

  private function set_rgb($r, $g, $b){
    $this->rgb = array($r, $g, $b);
    return $this;
  }

  public function convert_hex_to_rgb($hex_color){
    $hex_color = str_replace( '#', '', $hex_color );
    if(strlen($hex_color) == 3) // #fff, #000 etc. 
      $hex_color .= $hex_color;
    $this->rgb = array(
      hexdec(substr($hex_color, 0, 2)),
      hexdec(substr($hex_color, 2, 2)),
      hexdec(substr($hex_color, 4, 2))
    );
    return $this;
  }

  public function set_crop_coordinates($x, $y){
    $this->crop_coordinates = array($x, $y, $this->width, $this->height);
    return $this;
  }

  public function resize($new_width = null, $new_height = null, $method = null){
    if(!$new_width && !$new_height){
      $this->error = "Inform a new width and/or a new height.";
      return false;
    }

    $this->new_width = $new_width;
    $this->new_height = $new_height;
    
    
    $pos = strpos($this->new_width, '%');
    if($pos)
      $this->new_width = round($this->width*(preg_replace('/[^0-9]/', '', $this->new_width))/100)); 
    $pos = strpos($this->new_height, '%');
    if($pos)
      $this->new_height = round($this->height*(preg_replace('/[^0-9]/', '', $this->new_height))/100));
  }

  private function resize_with_no_method(){
  
  }

  private function fill_image(){
  
  }

  private function resize_with_fill(){
  
  }

  private function calculate_crop_coordinates(){
  
  }

  private function resize_with_crop(){
  
  }

  public function flip($orientation = 'h'){
  
  }

  public function rotate($degrees){
  
  }

  public function add_text_to_image($text, $options = array()){
  
  }

  private function calculate_text_position($position, $width, $height){
  
  }

  public function merge($image, $position, $alpha = 100){
  
  }

  public function filter($filter, $ammount = 1, $arguments){
  
  }

  public function set_quality($quality){
    $this->quality = $quality;
    return $this;
  }

  public function save($destination){
    if(!is_dir(dirname($destination)))
      $this->error = "Invalid destination directory.";

    if(!$this->error){
      $this->output_image($destination);  
      return true;
    }else{
      return false;
    }
  }
  
  public function show(){
    header( "Content-type: image/{$this->extension}" );
    $this->output_image();
    imagedestroy($this->image);
    exit;
  }
  
  private function output_image($destination = null){
    $pathinfo = pathinfo($destination);
    $extension = ($pathinfo['extension'] ? strtolower($pathinfo['extension']) : $this->extension);
    if($extension == 'jpg' || $extension =='jpeg' || $extension == 'bmp')
      imagejpeg($this->image, $destination, $this->quality);
    elseif($extension == 'png')
      imagepng($this->image, $destination);
    elseif($extensions == 'gif')
      imagegif($this->image, $destination);
    else
      return false;
  }

  public function error_message(){
    return $this->error;
  }

}
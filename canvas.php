<?php
require_once dirname(__FILE__).'/imagecreatefrombmp.php';

class canvas{

  private $file, $image, $temp_image;

  private $width, $height, $new_width, $new_height, $html_size;

  private $format, $extension, $size, $html_size, $basename, $dirname;

  private $rgb = array(255, 255, 255);

  private $crop_coordinates;

  private $error;

  public function __construct($file = null){
    if($file){
      $this->file = $file;
      $this->imageinfo();
    } 
  }

  private function image_info(){
    if(is_file($this->file)){
      $this->file_info();
      if(!$this->is_image())
        $this->error = "Invalid file. {$this->file} is not an image file.";
      else
        $this->dimensions()->create_image();
    }else{
      $this->error = "File not accessible/found.";
    }
  }

  public function load($file){
    $this->file = $file;
    $this->image_info();
    return $this;
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
  }

  private function is_image(){
    $imagesize = getimagesize($this->file);
    if(!is_array($imagesize) || empty($imagesize))
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

  public function load_url($url){
    $this->file = $url;
    $pathinfo = pathinfo($this->file);
    $this->extension = strtolower($pathinfo['extension']);
    $image_formats = array(
      'jpeg' => 2,
      'jpg' => 2,
      'gif' => 1,
      'png' => 3,
      'bmp' => 6
    );
    $this->format = $image_formats[$this->extension];
    if(!$this->format){
      $this->error = "Invalid image URL.";
    }else{
      $this->create_image();
      $this->width = imagesx($this->image);
      $this->height = imagesy($this->image);
    }
    return $this;
  }

  private function create_image(){
    switch($this->format){
      case 1:
        $this->image = imagecreatefromgif($this->file);
        $this->extension = 'gif';
        break;
      case 2:
        $this->image = imagecreatefromjpeg($this->file);
        $this->extension = 'jpg';
        break;
      case 3:
        $this->image = imagecreatefrompng($this->file);
        $this->extension = 'png';
        break;
      case 6:
        $this->image = imagecreatefrombmp($this->file);
        $this->extension = 'bmp';
        break;
      default:
        $this->error = "Invalid image file.";
        break;
    } 
  }

  private function set_rgb($r, $g, $b){
    $this->rgb = array($r, $g, $b);
    return $this;
  }

  public function convert_hex_to_rgb($hex_color){
    $hex_color = str_replace( '#', '', $hex_color );
    if(strlen($hex_color) == 3) 
      $hex_color .= $hex_color; // #fff, #000 etc.
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
    $this->new_width = $new_width;
    $this->new_height = $new_height;
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

  public function save($to = '', $quality = 100){
  
  }

  public function error_message(){
    return $this->error;
  }

}

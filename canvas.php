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
  
  }

  public function load_url($url){
  
  }

  private function create_image(){
  
  }

  private function set_rgb($r, $g, $b){
  
  }

  public function convert_hex_to_rgb($hex_color){
  
  }

  public function set_crop_coordinates($x, $y){
  
  }

  public function resize($new_width = null, $new_height = null, $method = null){
  
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

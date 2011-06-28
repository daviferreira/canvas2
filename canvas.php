<?php
class canvas{

  private $file, $image, $temp_image;

  private $width, $height, $new_width, $new_height, $html_size;

  private $format, $extension, $size, $file, $directory;

  private $rgb = array(255, 255, 255);

  private $crop_coordinates;

  public function __construct($file = null){
  
  }

  private function image_info(){
  
  }

  public function load($file){
  
  }

  private function dimensions(){
  
  }

  private function file_info(){
  
  }

  private function is_image(){
  
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

}

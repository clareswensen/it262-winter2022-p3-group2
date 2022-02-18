<?php
// MenuItem.php
// each item has name, description, price
// name = string, description = string, price = float, extras = array
// menu items have quantity selector

class MenuItem {
  public $name;
  public $description;
  public $price;
  public $quantity;
  private $max_quantitiy;

  public function __construct(String $name, String $description, Float $price, int $max_quantitiy) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->max_quantity = $max_quantitiy;
  }

  public function getName() {
    return $this->name;
  }
  public function getDesc() {
    return $this->description;
  }
  public function getPrice() {
    return $this->price;
  }
  public function getMax() {
    return $this->max_quantity;
  }
  public function getOption($option_count) {
    $opt = '';
    for ($i = 0; $i <= $option_count; $i ++) {
      $opt .= '<option value="'.$i.'">'.$i.'</option>';
    }
    return $opt;
  }
}
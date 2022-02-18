<?php

class CartItem
{
  public $quantity = 0;
  public $name;
  public $price;
  public $extras;

  public function __construct($quantity, $name, $price, $extras){
    $this->quantity = $quantity;
    $this->name = $name;
    $this->price = $price;
    $this->extras = $extras;
  }

  public function getQuantity(){
    return $this->quantity;
  }

  public function getPrice(){
    return $this->price;
  }

  public function getName() {
    return $this->name;
  }

  public function getExtras(){
    return $this->extras;
  }

}
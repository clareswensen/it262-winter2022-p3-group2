<?php

class CartItem
{
  public $quantity = 0;
  public $name;
  public $price;

  public function __construct($quantity, $name, $price){
    $this->quantity = $quantity;
    $this->name = $name;
    $this->price = $price;
  }

  public function getQuantity(){
    return $this->quantity;
  }

  public function getPrice(){
    return $this->price;
  }

}
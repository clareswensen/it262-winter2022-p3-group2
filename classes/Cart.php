<?php

class Cart
{
  public $top;
  public $store = array();

  public function __construct(){
    $this->top = -1;
  }
}
<?php

class Cart
{
  public $top;
  public $store = array();
  public $extras = array();

  public function __construct(){
    $this->top = -1;
  }
  public function pushToCart($menu){
    foreach($menu as $key => $item) {
      if($_POST[$item->getName()] > 0) { // check if item has been selected

        if (isset($_POST['extras'])) { // capture the extras from the post event
          $extras = $_POST['extras'];
        } else {
          $extras = [];
        }
        
        if (!isset($_SESSION['cart'][$item->getName()])) {
          $_SESSION['cart'][$item->getName()] = new CartItem($_POST[$item->getName()], $item->getName(), $item->getPrice(), $extras); // add the CartItem to the Cart
        } else {
          if (isset($_POST['extras'])) { // capture the extras from the post event
            $_SESSION['cart'][$item->getName()]->extras = array_merge($_SESSION['cart'][$item->getName()]->extras, $_POST['extras']);
          }
          $_SESSION['cart'][$item->getName()]->quantity = $_SESSION['cart'][$item->getName()]->quantity + $_POST[$item->getName()];
        }
      }
    }
  }
  public function clearCart(){
    session_abort();
    $_SESSION = array();
    $this->top = -1;
  }
}
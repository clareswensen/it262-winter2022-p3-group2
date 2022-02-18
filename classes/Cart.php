<?php
// start a session
session_start();

class Cart
{
  protected $stack;
  protected $limit;
  public $top;

  public function __construct($limit = 100){
    $this->stack = array();
    $this->top = -1;
    $this->limit = $limit;
  }

  public function getTop(){
    return $this->top;
  }

  public function setSesh(){
    $_SESSION['stack'] = $this->stack;
  }

  public function setTop(){
    $this->top = count($this->stack);
  }

  public function push($item) {
    if (count($this->stack) < $this->limit) { // stop overflow
      array_unshift($this->stack, $item); // add item to start of array
      $this->setTop();
    } else {
      throw new RunTimeException('stack full');
    }
    $this->setSesh();
  }

  public function pop() {
    if ($this->isEmpty()) {
      // stop underflow
      throw new RunTimeException('stack is empty');
    } else {
      return array_shift($this->stack); // pop item from start of array
    }
    $this->setSesh();
  }
  
  public function isEmpty() {
    return empty($this->stack);
  }

  public function pushToCart($menu){
    foreach($menu as $key => $item) {
      if($_POST[$item->getName()] > 0) { // check if item has been selected

        if (isset($_POST['extras'])) { // transform extras array into int used for calculating total
          $e = 0;
          for ($i = 0; $i <= count($_POST['extras']); $i++) {
            $e = $i;
          }
          $e = $e * $_POST[$item->getName()];
          $extras = $e;
        } else {
          $extras = 0; 
        }

        if (!isset($_SESSION['cart'][$item->getName()])) {
          $cartItem = new CartItem($_POST[$item->getName()], $item->getName(), $item->getPrice(), $extras);
          $_SESSION['cart'][$item->getName()] = $cartItem; // add the CartItem to the Cart
          $this->push($cartItem);
        } else {
          // update the quantity of the existing item
          $_SESSION['cart'][$item->getName()]->quantity = $_SESSION['cart'][$item->getName()]->quantity + $_POST[$item->getName()];
          $_SESSION['cart'][$item->getName()]->extras = $_SESSION['cart'][$item->getName()]->extras + $extras;
          $this->setTop();
        }
      }
    }
  }
  public function clearCart(){
    session_destroy();
    $_SESSION = array();
    $this->top = -1;
  }
}
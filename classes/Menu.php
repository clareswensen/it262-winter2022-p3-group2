<?php
include('CartItem.php');
// Menu.php
class Menu {
  public $title;
  public $menuData;
  public $tax = .065;
  // stack, list, queue
  public $cart = [];
  public $extras = array('Guacamole', 'Sour cream', 'Cheese');

  public function __construct($menuData, $title) {
    $this->title = $title;
    $this->menuData = $menuData;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setExtras(){
    $opt = '';
    foreach($this->extras as $extra){
      $opt .= '<input type="checkbox" name="extras[]" value="'.$extra.'">'.$extra.'</input>'; 
    }
    return $opt;
  }

  public function buildMenu() {
    $str = '<h1>'.$this->getTitle().'</h1>';

    foreach($this->menuData as $menuItem) {
      $str .= 
      '<div class="item-container">
        <h2>'.$menuItem->getName().'</h2>
        <p>'.$menuItem->getDesc().'</p>
        <p>'.$menuItem->getPrice().'</p>
        <select name="'.$menuItem->getName().'">'.$menuItem->getOption($menuItem->getMax()).'</select>'
        .$this->setExtras().'
      </div>';
    }
    echo $str;
  }

  public function buildCart($menu_data) {
    foreach($menu_data as $item => $val) {
      if (empty($_POST[$val->getName()])) {
        echo '';
      } else {
        $quantity = (int)$_POST[$val->getName()];
        $extras = $_POST['extras'];
        // push to cart
        $this->cart[] = new CartItem($quantity, $val->getName(), $val->getPrice(), $extras);
        echo '<div class="item-div"><p class="cart-item">'.$val->getName().' x '.$quantity.'';
        echo ' = $'.$val->getPrice() * $quantity.'</p></div>';
        echo '<br>';
      }
    }
  }

  public function calculateTotal(){
    $cost = 0;
    $total = 0;
    foreach($this->cart as $cart_item => $cart_item_val) {
      $quantity = $cart_item_val->getQuantity();
      $cost = $total += $cart_item_val->getPrice() * $quantity;
      $extra_cost = $cart_item_val->getExtras() * .25;
      $total = $total + $extra_cost;
      $total = ROUND($total+ ($total * $this->tax), 2);
    }

    //echo '<p class="subtotal">Subtotal:  $'.$total.'</p>';
    //echo '<p class="tax">Tax:  $'.$total.'</p>';
    echo '<p class="total">Grand Total:  $'.$total.'</p>';

  }
}
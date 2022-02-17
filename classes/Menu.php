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
      $opt .= '<span class="extras-container"><input type="checkbox" name="extras[]" value="'.$extra.'">'.$extra.'</input></span>'; 
    }
    return $opt;
  }

  public function buildMenu() {
    $str = '<h1 class="menu-title">'.$this->getTitle().'</h1>';

    foreach($this->menuData as $menuItem) {
      $str .= 
      '<div class="item-container">
        <h2>'.$menuItem->getName().'</h2>
        <p>'.$menuItem->getDesc().'</p>
        <p class="item-price">'.$menuItem->getPrice().'</p>
        <select name="'.$menuItem->getName().'">'.$menuItem->getOption($menuItem->getMax()).'</select>'
        .$this->setExtras().'
      </div>';
    }
    echo $str;
    echo '<hr>';
  }
 
  public function buildCart($menu_data) {
    foreach($menu_data as $val) {
      if (empty($_POST[$val->getName()])) {
        echo '';
      } else {
        $quantity = (int)$_POST[$val->getName()];
        if (isset($_POST['extras'])){
          $extras = $_POST['extras'];
        } else {
          $extras = [];
        }
        // push to cart
        $this->cart[] = new CartItem($quantity, $val->getName(), $val->getPrice(), $extras);
        echo '<div class="item-div"><p class="cart-item">'.$val->getName().' x '.$quantity.'';
        echo ' = $'.$val->getPrice() * $quantity.'</p></div>';
      }
    }
  }

  public function calculateTotal(){
    $total = 0;
    $subtotal = 0;
    $extra_cost = 0;
    foreach($this->cart as $cart_item => $cart_item_val) {
      $itemQuantity = $cart_item_val->getQuantity();
      $subtotal += $cart_item_val->getPrice() * $itemQuantity;
      $extra_cost = $cart_item_val->getExtras() * .25;
      $subtotal += $extra_cost;
      // $total = $total + $extra_cost;
      // $total = ROUND($total+ ($total * $this->tax), 2);
    }
    $total = number_format($subtotal+ ($subtotal * $this->tax), 2);
    echo '<p class="add-ons">Add-Ons:  $'.number_format(($extra_cost), 2).'</p>';
    echo '<p class="subtotal">Subtotal:  $'.number_format(($subtotal), 2).'</p>';
    echo '<p class="tax">Tax:  $'.number_format(($subtotal * $this->tax), 2).'</p>';
    echo '<p class="total">Grand Total:  $'.$total.'</p>';

  }
}
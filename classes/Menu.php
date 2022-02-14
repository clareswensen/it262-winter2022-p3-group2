<?php
include('CartItem.php');
// Menu.php
class Menu {
  public $title;
  public $menuData;
  // stack, list, queue
  public $cart = [];

  public function __construct($menuData, $title) {
    $this->title = $title;
    $this->menuData = $menuData;
  }

  public function getTitle() {
    return $this->title;
  }

  public function buildMenu() {
    $str = '<h1>'.$this->getTitle().'</h1>';

    foreach($this->menuData as $menuItem) {
      $str .= 
      '<div class="item-container">
        <h2>'.$menuItem->getName().'</h2>
        <p>'.$menuItem->getDesc().'</p>
        <p>'.$menuItem->getPrice().'</p>
        <select name='.$menuItem->getName().'>'.$menuItem->getOption($menuItem->getMax(), $menuItem->getName()).'</select>
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
        // push
        $this->cart[] = new CartItem($quantity, $val->getName(), $val->getPrice());
        echo '<div class="item-div"><p class="cart-item">'.$val->getName().' x'.$quantity.'';
        echo ' = $'.$val->getPrice() * $quantity.'</p></div>';
        echo '<br>'; 
      }
    }
  }

  public function calculateTotal(){
    $total = 0;
    foreach($this->cart as $cart_item => $cart_item_val) {
      $quantity = $cart_item_val->getQuantity();
      $total += $cart_item_val->getPrice() * $quantity;
    }
    echo '<p class="total">Grand Total:  $'.$total.'</p>';
  }
}
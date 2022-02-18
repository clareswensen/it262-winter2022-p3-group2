<?php
// include('CartItem.php');
// Menu.php
class Menu {
  public $title;
  public $menuItems;
  public $tax = .065;
  public $extras = array('Guacamole', 'Sour cream', 'Cheese');

  public function __construct($menuItems, $title) {
    $this->title = $title;
    $this->menuItems = $menuItems;
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

  public function getMenu() {
    $str = '<h1 class="menu-title">'.$this->getTitle().'</h1>';
    foreach($this->menuItems as $menuItem) {
      $str .= 
      '
        <div class="item-container">
          <h2>'.$menuItem->getName().'</h2>
          <p>'.$menuItem->getDesc().'</p>
          <p class="item-price">$'.$menuItem->getPrice().'</p>
          <select name="'.$menuItem->getName().'">'.$menuItem->getOption($menuItem->getMax()).'</select>'
          .$this->setExtras().'
        </div>'
      ;
    }
    echo $str;
  }

  public function showCart($cartItems) {
    foreach($cartItems as $item => $val) {
      echo '
      <div class="item-div">
        <p class="cart-item">'.$val->getName().' x'.$val->getQuantity().'
      ';
    }
  }

  public function calculateTotal($cart){
    $total = 0;
    $subtotal = 0;
    $extra_cost = 0;
    // for($i = 0; $i < count($cart) - 1; $i++){
    //   $quantity = 0;
    //   for ($j = 0; $j < count($cart); $j++){
    //     if ($cart[$i]->name == $cart[$j]->name){
    //       $quantity = $quantity + 1;
    //     }
    //   }
    // }
    // echo $quantity;
    foreach($cart as $cart_item => $cart_item_val) {
      $itemQuantity = $cart_item_val->getQuantity();
      $subtotal += $cart_item_val->getPrice() * $itemQuantity;
      $extra_cost += $cart_item_val->getExtras() * .25;
      $subtotal += $extra_cost;
    }
    $total = number_format($subtotal+ ($subtotal * $this->tax), 2);
    echo '<p class="add-ons">Add-Ons:  $'.number_format(($extra_cost), 2).'</p>';
    echo '<p class="subtotal">Subtotal:  $'.number_format(($subtotal), 2).'</p>';
    echo '<p class="tax">Tax:  $'.number_format(($subtotal * $this->tax), 2).'</p>';
    echo '<p class="total">Grand Total:  $'.$total.'</p>';

  }
}
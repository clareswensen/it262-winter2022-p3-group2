<?php
// Menu.php
class Menu {
  public $title;
  public $menuData;

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
        <select>'.$menuItem->getOption($menuItem->getMax(), $menuItem->getName()).'</select>
      </div>';
    }
    echo $str;
  }

  public function calculateTotal($cart){
    // kata:
    // sum the prices of the objects stored in the $cart array
    // output the total
  }
}
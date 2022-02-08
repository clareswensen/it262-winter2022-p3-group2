<?php
// MenuItem.php
// each item has name, description, price
// name = string, description = string, price = float, extras = array
// menu items have quantity selector

class MenuItem {
  public $name = '';
  public $description = '';
  public $price = 0;

  public function __construct($name, $description, $price) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }
  public function getPrice() {
    echo $this->price;
  }
}
// class Item
// {
//   public $ID = 0;
//   public $Name = '';
//   public $Description = '';
//   public $Price = 0;
//   public $Extras = array();

//   public function __construct($ID, $Name, $Description, $Price)
//   {
//     $this->ID = $ID;
//     $this->Name = $Name;
//     $this->Description = $Description;
//     $this->Price = $Price;
//   } // end of Item constructor

//   public function addExtra($Extra)
//   {
//     $this->Extras[] = $Extra;
//   } // end of addExtra

// } // end of item class
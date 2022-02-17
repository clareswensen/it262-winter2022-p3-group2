<?php
// menu.php
// this is the home page for app where users can select items from a menu and add to a cart
include('classes/Menu.php');
include('classes/MenuItem.php');
include('classes/CartItem.php');

// start a session
session_start();

// build an array of MenuItem objects
$menuItems[] = new MenuItem('Taco', 'A crispy or soft corn or wheat tortilla that is folded or rolled and stuffed with a mixture', 2.99, 10);
$menuItems[] = new MenuItem('Burrito', 'A Mexican food that consists of a flour tortilla that is rolled or folded around your choice of filling', 12.99, 5);
$menuItems[] = new MenuItem('Torta', 'A Mexican sandwich served on a soft roll and filled with choice of meat, sauce, and choice of toppings', 7.99, 5);

// instantiate a new Menu, passing menuItems and a title string
$menu = new Menu($menuItems, 'Menu');

// add to cart function:
if(isset($_POST['addToCart'])) { // if the addToCart button been pushed...

  foreach($menuItems as $item => $val) {

    // check if item has been selected
    if($_POST[$val->getName()] > 0) {
      
      if (isset($_POST['extras'])) { // capture the extras from the post event
        $extras = $_POST['extras'];
      } else {
        $extras = [];
      }
      
      $_SESSION[$val->getName()] = new CartItem((int)$_POST[$val->getName()], $val->getName(), $val->getPrice(), $extras); // add the CartItem to the Cart
    }
  }
}

// clear cart function:
if (isset($_POST['emptyCart'])) {
  $_SESSION = [];
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link href="style.css" rel="stylesheet">
  <title>IT262 P3: Food Truck</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header ms-5">
        <a class="navbar-brand" href="#"><span class="grn">Con Amigos</span> <span class="wht">Taco</span> <span class="red">Truck</span></a>   
  </nav>
  <div class="row">
    <div class="col-6">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST">
        <?php $menu->getMenu(); ?>
        <input type="submit" name="addToCart" value="Add To Cart" class="btn-success btn-lg">
      </div>
      <div class="col-6">
        <h1 class="header">Cart</h1>
        <div class="cart-container">
          <h1>Order Details:</h1>
          <?php $menu->showCart($_SESSION);?>
          <p>
            <?php $menu->calculateTotal($_SESSION); ?>
          </p>
          <div class="btn-group">
            <span><input class="btn-danger btn-lg" type="submit" name="emptyCart" value="empty cart"></input></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
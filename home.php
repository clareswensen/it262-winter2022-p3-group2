<?php
// menu.php
// this is the home page for app where users can select items from a menu and add to a cart
include('classes/Menu.php');
include('classes/MenuItem.php');
include('classes/CartItem.php');
include('classes/Cart.php');

// build an array of MenuItem objects
$menuItems[] = new MenuItem('Taco', 'A crispy or soft corn or wheat tortilla that is folded or rolled and stuffed with a mixture', 2.99, 10);
$menuItems[] = new MenuItem('Burrito', 'A Mexican food that consists of a flour tortilla that is rolled or folded around your choice of filling', 12.99, 5);
$menuItems[] = new MenuItem('Torta', 'A Mexican sandwich served on a soft roll and filled with choice of meat, sauce, and choice of toppings', 7.99, 5);

// instantiate a new Menu, passing menuItems and a title string
$menu = new Menu($menuItems, 'Menu');
$cart = new Cart();

// listeners
if(isset($_POST['addToCart'])) {
  $cart->pushToCart($menuItems);
}
if (isset($_POST['emptyCart'])) {
  $cart->clearCart();
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-6 col-md-10">
              <?php $menu->getMenu(); ?>
            </div>
            <div class="col-lg-6 col-md-10">
              <h1 class="header">Shopping Cart</h1>
              <div class="cart-container">
                <h1>Order Details:</h1>
                <?php 
                if (isset($_SESSION['cart'])){
                  $menu->showCart($_SESSION['cart']);
                ?>
                <p>
                  <?php
                    $menu->calculateTotal($_SESSION['cart']);
                  } else {
                    echo 'Your Cart is Empty';
                  }?>
                </p>
                <div class="btn-group">
                  <input type="submit" name="addToCart" value="Add To Cart" class="btn-success btn-lg sticky">
                  <span><input class="btn-danger btn-lg" type="submit" name="emptyCart" value="Empty Cart"></input></span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
  </div>
</body>
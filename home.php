<?php 
// menu.php
// home page for app where user can select items from menu and add to cart
include('classes/Menu.php');
include('classes/MenuItem.php');
// include('classes/CartItem.php');

$menu_data[] = new MenuItem('Taco', 'Delicious!', 2.99, 10);
$menu_data[] = new MenuItem('Burrito', 'Extra Tasty!', 12.99, 5);
$menu_data[] = new MenuItem('Torta', 'Muy Especial!', 7.99, 5);


$menu = new Menu($menu_data, 'Con Amigos Tacos');

$menu->buildCart($menu_data);

IF ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $menu->calculateTotal();
} else {
  echo 'Your cart is empty';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>IT262 P3: Food Truck</title>
</head>
<body>
  <form action="" method="POST">
    <?php $menu->buildMenu() ;?>
    <input type="submit" value="Add To Cart">
  </form>
</body>
</html>

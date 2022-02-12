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
$menu->calculateTotal();

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
      <a class="navbar-brand" href="#">Con Amigos Taco Truck</a>
    </div>
    <ul class="nav navbar-nav ms-auto">
      <li class="nav-item me-5"><a href="#" class="nav-link active">Home</a></li>
      <li class="nav-item me-5"><a href="#" class="nav-link">Menu</a></li>
      <li class="nav-item me-5"><a href="#" class="nav-link">Locations</a></li>
      <li class="nav-item me-5"><a href="#" class="nav-link">Contact</a></li>
    </ul>
  </div>
</nav>
<div class="row">
  <div class="col-sm-8">
  <form action="" method="POST">
    <?php $menu->buildMenu() ;?>
    <input type="submit"> Add To Cart
  </form>
  </div>
  <div class="col-sm-4">
    <div class="container">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure labore eligendi, nam quibusdam exercitationem quaerat sequi deleniti soluta tenetur blanditiis obcaecati cum! Modi eligendi, earum rerum similique nesciunt repellat temporibus!</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure labore eligendi, nam quibusdam exercitationem quaerat sequi deleniti soluta tenetur blanditiis obcaecati cum! Modi eligendi, earum rerum similique nesciunt repellat temporibus!</p>
    </div>
  </div>
</div>
</body>
</html>

<?php 
// menu.php
// home page for app where user can select items from menu and add to cart
include('classes/MenuItem.php');
$item1 = new MenuItem('Taco', 'Delicious!', 2.99); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link src="style.css" rel="stylesheet">
  <title>IT262 P3: Food Truck</title>
</head>
<body>
  <h1>Hello, World!</h1>
  <div>
    <?php $item1->getPrice() ;?>
  </div>
</body>
</html>

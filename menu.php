<?php 
// menu.php
// home page for app where user can select items from menu and add to cart
include('classes/Menu.php');
include('classes/MenuItem.php');

$menu_data[] = new MenuItem('Taco', 'Delicious!', 2.99, 10);
$menu_data[] = new MenuItem('Burrito', 'Extra Tasty!', 12.99, 5);

$menu = new Menu($menu_data, 'Con Amigos Tacos');

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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <?php $menu->buildMenu() ;?>
    <button type="submit"> Add To Cart </button>
  </form>
</body>
</html>

<?php 
// menu.php
// home page for app where user can select items from menu and add to cart
include('classes/Menu.php');
include('classes/MenuItem.php');

$menu_data[] = new MenuItem('Taco', 'Delicious!', 2.99, 10);
$menu_data[] = new MenuItem('Burrito', 'Extra Tasty!', 12.99, 5);
$menu_data[] = new MenuItem('Torta', 'Muy Especial!', 7.99, 5);
$menu = new Menu($menu_data, 'Con Amigos Tacos');

foreach($menu_data as $item => $val) {
  if (empty($_POST[$val->getName()])) {
    echo 'error';
  } else {
    echo $val->getName();
    echo $val->getPrice();
  }
}
// if(empty($_POST['Taco'])) {
//   echo 'error';
// } else {
//   echo $_POST['Taco'];
// }

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
    <input type="submit"> Add To Cart
  </form>
</body>
</html>

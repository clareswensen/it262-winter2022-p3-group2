<?php
// menu.php
// home page for app where user can select items from menu and add to cart
include('classes/Menu.php');
include('classes/MenuItem.php');
// include('classes/CartItem.php');

$menu_data[] = new MenuItem('Taco', 'A crispy or soft corn or wheat tortilla that is folded or rolled and stuffed with a mixture', 2.99, 10);
$menu_data[] = new MenuItem('Burrito', 'A Mexican food that consists of a flour tortilla that is rolled or folded around your choice of filling', 12.99, 5);
$menu_data[] = new MenuItem('Torta', 'A Mexican sandwich served on a soft roll and filled with choice of meat, sauce, and choice of toppings', 7.99, 5);

$menu = new Menu($menu_data, 'Menu');

// IF ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $menu->buildCart($menu_data);
//   $menu->calculateTotal();
// } else {
//   echo 'Your cart is empty';
// }

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
      </div>
      <ul class="nav navbar-nav ms-auto">
        <li class="nav-item me-5"><a href="#" class="nav-link active text-warning">Home</a></li>
        <li class="nav-item me-5"><a href="#" class="nav-link text-warning">Menu</a></li>
        <li class="nav-item me-5"><a href="#" class="nav-link text-warning">Locations</a></li>
        <li class="nav-item me-5"><a href="#" class="nav-link text-warning">Contact</a></li>
      </ul>
    </div>
  </nav>
  <div class="row">
    <div class="col-sm-8">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <?php $menu->buildMenu(); ?>
        <div class="btn-group">
          <input type="submit" value="Add To Cart" class="btn-success btn-lg">
          <span class="btn-danger btn-lg"><a class="button-text" href="">Empty Cart</a></span>
        </div>
      </form>
    </div>
    <div class="col-sm-2">
      <h1 class="cart-header">Shopping Cart</h1>
      <div class="container">
        <p><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $menu->buildCart($menu_data);
            } else {
              echo '<p>Your cart is empty.</p>';
            } ?></p>
        <p><?php $menu->calculateTotal(); ?></p>
      </div>
    </div>
  </div>
</body>

</html>
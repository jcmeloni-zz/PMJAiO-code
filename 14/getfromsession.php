<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Your Products</title>
  </head>

  <body>
    <h1>Your Products</h1>
    <p>Your chosen products are:</p>
    <ul>
      <li><?php echo $_SESSION['product1']; ?></li>
      <li><?php echo $_SESSION['product2']; ?></li>
    </ul>
  </body>
</html>
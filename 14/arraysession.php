<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Storing an array with a session</title>
</head>
<body>
<h1>Product Choice Page</h1>
<?php
if (isset($_POST['form_products'])) {
    if (!empty($_SESSION['products'])) {
        $products = array_unique(
        array_merge(unserialize($_SESSION['products']),
        $_POST['form_products']));
        $_SESSION['products'] = serialize($products);
    } else {
        $_SESSION['products'] = serialize($_POST['form_products']);
  }
   echo "<p>Your products have been registered!</p>";
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><label for="form_products">Select some products:</label><br>
<select id="form_products" name="form_products[]" multiple="multiple" size="3">
<option value="Sonic Screwdriver">Sonic Screwdriver</option>
<option value="Hal 2000">Hal 2000</option>
<option value="Tardis">Tardis</option>
<option value="ORAC">ORAC</option>
<option value="Transporter bracelet">Transporter bracelet</option>
</select></p>
<button type="submit" name="submit" value="choose">Submit Form</button>
</form>
<p><a href="session1.php">go to content page</a></p>
</body>
</html>


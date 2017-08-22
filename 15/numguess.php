<?php
$num_to_guess = 42;
if (!isset($_POST['guess'])) {
  $message = "Welcome to the guessing machine!";
} elseif (!is_numeric($_POST['guess'])) { // is not numeric
   $message = "I don't understand that response.";
} elseif ($_POST['guess'] == $num_to_guess) { // matches!
   $message = "Well done!";
} elseif ($_POST['guess'] > $num_to_guess) {
  $message = $_POST['guess']." is too big! Try a smaller number.";
} elseif ($_POST['guess'] < $num_to_guess) {
   $message = $_POST['guess']." is too small! Try a larger number.";
} else  { // some other condition
   $message = "I am terribly confused.";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>A PHP number guessing script</title>
  </head>
  <body>
    <h1><?php echo $message; ?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><label for="guess">Type your guess here:</label><br>
    <input type="text" id="guess" name="guess"></p>
    <button type="submit" name="submit" value="submit">Submit</button>
    </form>
  </body>
</html>

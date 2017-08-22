<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Accessing Session Variables</title>
</head>
<body>
<h1>Content Page</h1>
<?php
if (isset($_SESSION['products'])) {
	echo "<strong>Your cart:</strong><ol>";
	foreach (unserialize($_SESSION['products']) as $p) {
		echo "<li>".$p."</li>";
	}
	echo "</ol>";
}
?>
<p><a href="arraysession.php">return to product choice page</a></p>
</body>
</html>

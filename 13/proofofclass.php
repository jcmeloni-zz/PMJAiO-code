<?php
class myClass {
	//code will go here
}
$object1 = new myClass();
echo "\$object1 is an ".gettype($object1).".<br>";

if (is_object($object1)) {
	echo "Really! I swear \$object1 is an object!";
}
?>

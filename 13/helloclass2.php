<?php
class myClass {
	public $name = "Jimbo";
	function sayHello() {
		echo "HELLO! My name is ".$this->name;
	}
}
$object1 = new myClass();
$object1 -> sayHello();
?>


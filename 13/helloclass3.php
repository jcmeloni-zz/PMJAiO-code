<?php
class myClass {
	public $name = "Jimbo";
	function setName($n) {
		$this->name = $n;
	}
	function sayHello() {
		echo "HELLO! My name is ".$this->name;
	}
}
$object1 = new myClass();
$object1 -> setName("Julie");
$object1 -> sayHello();
?>

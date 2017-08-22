<?php
class myCar {
	public $color = "blue";
	public $make = "Jeep";
	public $model = "Renegade";
}
$car = new myCar();
$car -> color = "red";
$car -> make = "Porsche";
$car -> model = "Boxter";
echo "I drive a: ".$car -> color." ".$car -> make." ".$car -> model;
?>

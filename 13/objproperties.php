<?php
class myCar {
	public $color = "blue";
	public $make = "Jeep";
	public $model = "Renegade";
}
$car = new myCar();
echo "I drive a: ".$car->color." ".$car->make." ".$car->model;
?>

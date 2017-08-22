<?php
$characters = array(
				array(
				"name" => "Bob",
				"occupation" => "superhero",
				"age" => 30,
				"special power" => "x-ray vision"
				),
				array(
				"name" => "Sally",
				"occupation" => "superhero",
				"age" => 24,
				"special power" => "superhuman strength"
				),
				array(
				"name" => "Jane",
				"occupation" => "arch villain",
				"age" => 45,
				"special power" => "nanotechnology"
				)
			);

foreach ($characters as $c) {
        while (list($k, $v) = each ($c)) {
                echo "$k ... $v <br>";
        }
        echo "<hr>";
}

?>

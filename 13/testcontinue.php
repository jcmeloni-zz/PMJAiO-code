<?php
$counter = -4;
for (; $counter <= 10; $counter++) {
	if ($counter == 0) {
		continue;
	}
	$temp = 4000/$counter;
	echo "4000 divided by ".$counter." is... ".$temp."<br>";
}
?>

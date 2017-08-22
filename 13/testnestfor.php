<?php
echo "<table style=\"border: 1px solid #000;\"> \n";
for ($y=1; $y<=12; $y++) {
	echo "<tr> \n";
	for ($x=1; $x<=12; $x++) {
		echo "<td style=\"border: 1px solid #000; width: 25px; text-align:center;\">";
		echo ($x * $y);
		echo "</td> \n";
	}
	echo "</tr> \n";
}
echo "</table>";
?>

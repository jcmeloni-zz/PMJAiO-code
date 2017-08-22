<?php
$life=42;
function meaningOfLife()
{
	global $life;
	echo "The meaning of life is ".$life;
}
meaningOfLife();
?>

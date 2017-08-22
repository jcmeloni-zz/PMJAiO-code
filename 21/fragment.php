<?php
if ((!isset($_POST['month'])) || (!isset($_POST['year']))) {
	$nowArray = getdate();
	$month = $nowArray['mon'];
	$year = $nowArray['year'];
} else {
	$month = $_POST['month'];
	$year = $_POST['year'];
}
$start = mktime (12, 0, 0, $month, 1, $year);
$firstDayArray = getdate($start);
?>

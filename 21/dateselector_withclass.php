<!DOCTYPE html>
<html>
<head>
<title>Using the date_pulldown Class</title>
</head>
<?php
include("date_pulldown.class.php");
$date1 = new date_pulldown("fromdate");
$date2 = new date_pulldown("todate");
$date3 = new date_pulldown("foundingdate");
$date3->setYearStart("1972");
if (empty($foundingdate)) {
	$date3->setDate_array(array("mday"=>26, "mon"=>4, "year"=>1984));
}
?>
<body>
<form>
<p><strong>From:</strong><br>
<?php echo $date1->output(); ?></p>

<p><strong>To:</strong><br>
<?php echo $date2->output(); ?></p>

<p><strong>Company Founded:</strong><br>
<?php echo $date3->output(); ?></p>

<button type="submit" name="submit" value="submit">Submit</button>
</form>
</body>
</html>

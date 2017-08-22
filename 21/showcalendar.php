<?php
define("ADAY", (60*60*24));
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
<!DOCTYPE html>
<html>
<head>
  <title><?php echo "Calendar: ".$firstDayArray['month']." ".$firstDayArray['year']; ?></title>
  <style type="text/css">
    table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th {
        border: 1px solid black;
        padding: 6px;
        font-weight: bold;
        background: #ccc;
    }
    td {
        border: 1px solid black;
        padding: 6px;
        vertical-align: top;
        width: 100px;
    }
  </style>
</head>
<body>
  <h1>Select a Month/Year Combination</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select name="month">
    <?php
    $months = Array("January", "February", "March", "April", "May",  "June", "July", "August", "September", "October", "November", "December");
    for ($x=1; $x <= count($months); $x++) {
    	echo"<option value=\"$x\"";
	  if ($x == $month) {
	  	echo " selected";
	  }
    	echo ">".$months[$x-1]."</option>";
    }
    ?>
    </select>
    <select name="year">
    <?php
    for ($x=1990; $x<=2020; $x++) {
    	echo "<option";
    	if ($x == $year) {
    		echo " selected";
    	}
    	echo ">$x</option>";
    }
    ?>
    </select>
    <button type="submit" name="submit" value="submit">Go!</button>
    </form>
    <br>
    <?php
    $days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
    echo "<table><tr>\n";
    foreach ($days as $day) {
      echo "<th>".$day."</th>\n";
    }
    for ($count=0; $count < (6*7); $count++) {
    	$dayArray = getdate($start);
    	if (($count % 7) == 0) {
    		if ($dayArray['mon'] != $month) {
    			break;
     		} else {
    			echo "</tr><tr>\n";
    		}
    	}
    	if ($count < $firstDayArray['wday'] || $dayArray['mon'] != $month) {
    		echo "<td>&nbsp;</td>\n";
    	} else {
    		echo "<td>".$dayArray['mday']."</td>\n";
    		$start += ADAY;
    	}
    }
    echo "</tr></table>";
    ?>
</body>
</html>


<?php
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "SELECT * FROM testTable";
	$res = mysqli_query($mysqli, $sql);

	if ($res) {
		$number_of_rows = mysqli_num_rows($res);
		printf("Result set has %d rows.\n", $number_of_rows);
	} else {
		printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
	}

	mysqli_free_result($res);
	mysqli_close($mysqli);
}
?>
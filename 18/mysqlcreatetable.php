<?php
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "CREATE TABLE testTable (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, testField VARCHAR (75))";
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
	   	echo "Table testTable successfully created.";
	} else {
		printf("Could not create table: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}
?>
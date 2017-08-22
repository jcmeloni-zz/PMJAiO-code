<?php
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$clean_text = mysqli_real_escape_string($mysqli, $_POST['testfield']);
	$sql = "INSERT INTO testTable (testField) VALUES ('".$clean_text."')";
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
	   	echo "A record has been inserted.";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}
?>
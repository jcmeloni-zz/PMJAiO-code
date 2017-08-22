<?php
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$sql = "SELECT * FROM testTable";
	$res = mysqli_query($mysqli, $sql);

	if ($res) {
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$id  = $newArray['id'];
			$testField = $newArray['testField'];
			echo "The ID is ".$id." and the text is: ".$testField."<br>";
	   	}
	} else {
		printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
	}

	mysqli_free_result($res);
	mysqli_close($mysqli);
}
?>
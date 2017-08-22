<?php
$mood = "sad";
switch ($mood) {
	case "happy":
		echo "Hooray! I'm in a good mood!";
		break;
	case "sad":
		echo "Awww. Don't be down!";
		break;
	default:
		echo "I'm neither happy nor sad, but $mood.";
		break;
}
?>

<?php
include 'db_include.php';
doDB();

//check for required fields from the form
if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])) {
	header("Location: addtopic.html");
	exit;
}

//create safe values for input into the database
$clean_topic_owner = mysqli_real_escape_string($mysqli, $_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($mysqli, $_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($mysqli, $_POST['post_text']);

//create and issue the first query
$add_topic_sql = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner) VALUES ('".$clean_topic_title ."', now(), '".$clean_topic_owner."')";

$add_topic_res = mysqli_query($mysqli, $add_topic_sql) or die(mysqli_error($mysqli));

//get the id of the last query
$topic_id = mysqli_insert_id($mysqli);

//create and issue the second query
$add_post_sql = "INSERT INTO forum_posts (topic_id, post_text, post_create_time, post_owner) VALUES ('".$topic_id."', '".$clean_post_text."',  now(), '".$clean_topic_owner."')";

$add_post_res = mysqli_query($mysqli, $add_post_sql) or die(mysqli_error($mysqli));

//close connection to MySQL
mysqli_close($mysqli);

//create nice message for user
$display_block = "<p>The <strong>".$_POST["topic_title"]."</strong> topic has been created.</p>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>New Topic Added</title>
</head>
<body>
  <h1>New Topic Added</h1>
  <?php echo $display_block; ?>
</body>
</html>

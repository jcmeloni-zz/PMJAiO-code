<?php
include 'db_include.php';
doDB();

//check for required info from the query string
if (!isset($_GET['topic_id'])) {
	header("Location: topiclist.php");
	exit;
}

//create safe values for use
$safe_topic_id = mysqli_real_escape_string($mysqli, $_GET['topic_id']);

//verify the topic exists
$verify_topic_sql = "SELECT topic_title FROM forum_topics WHERE topic_id = '".$safe_topic_id."'";
$verify_topic_res =  mysqli_query($mysqli, $verify_topic_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($verify_topic_res) < 1) {
	//this topic does not exist
	$display_block = "<p><em>You have selected an invalid topic.<br>
	Please <a href=\"topiclist.php\">try again</a>.</em></p>";
} else {
	//get the topic title
	while ($topic_info = mysqli_fetch_array($verify_topic_res)) {
		$topic_title = stripslashes($topic_info['topic_title']);
	}

	//gather the posts
	$get_posts_sql = "SELECT post_id, post_text, DATE_FORMAT(post_create_time, '%b %e %Y<br>%r') AS fmt_post_create_time, post_owner FROM forum_posts WHERE topic_id = '".$safe_topic_id."' ORDER BY post_create_time ASC";
	$get_posts_res = mysqli_query($mysqli, $get_posts_sql) or die(mysqli_error($mysqli));

	//create the display string
	$display_block = <<<END_OF_TEXT
	<p>Showing posts for the <strong>$topic_title</strong> topic:</p>
	<table>
	<tr>
	<th>AUTHOR</th>
	<th>POST</th>
	</tr>
END_OF_TEXT;

	while ($posts_info = mysqli_fetch_array($get_posts_res)) {
		$post_id = $posts_info['post_id'];
		$post_text = nl2br(stripslashes($posts_info['post_text']));
		$post_create_time = $posts_info['fmt_post_create_time'];
		$post_owner = stripslashes($posts_info['post_owner']);

		//add to display
	 	$display_block .= <<<END_OF_TEXT
		<tr>
		<td><p>$post_owner</p><p>created on:<br>$post_create_time</p></td>
		<td><p>$post_text</p>
		<p><a href="replytopost.php?post_id=$post_id"><strong>REPLY TO POST</strong></a></p></td>
		</tr>
END_OF_TEXT;
	}

	//free results
	mysqli_free_result($get_posts_res);
	mysqli_free_result($verify_topic_res);

	//close connection to MySQL
	mysqli_close($mysqli);

	//close up the table
	$display_block .= "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Posts in Topic</title>
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
	}
	.num_posts_col { text-align: center; }
  </style>
</head>
<body>
  <h1>Posts in Topic</h1>
  <?php echo $display_block; ?>
</body>
</html>

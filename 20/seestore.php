<?php
//connect to database
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

$display_block = "<h1>My Categories</h1>
<p>Select a category to see its items.</p>";

//show categories first
$get_cats_sql = "SELECT id, cat_title, cat_desc FROM store_categories ORDER BY cat_title";
$get_cats_res =  mysqli_query($mysqli, $get_cats_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_cats_res) < 1) {
   $display_block = "<p><em>Sorry, no categories to browse.</em></p>";
} else {
   while ($cats = mysqli_fetch_array($get_cats_res)) {
        $cat_id  = $cats['id'];
        $cat_title = strtoupper(stripslashes($cats['cat_title']));
        $cat_desc = stripslashes($cats['cat_desc']);

        $display_block .= "<p><strong><a href=\"".$_SERVER['PHP_SELF']."?cat_id=".$cat_id."\">".$cat_title."</a></strong><br>".$cat_desc."</p>";

        if (isset($_GET['cat_id']) && ($_GET['cat_id'] == $cat_id)) {

          //create safe value for use
  			  $safe_cat_id = mysqli_real_escape_string($mysqli, $_GET['cat_id']);

			   //get items
			   $get_items_sql = "SELECT id, item_title, item_price FROM store_items WHERE cat_id = '".$safe_cat_id."' ORDER BY item_title";
			   $get_items_res = mysqli_query($mysqli, $get_items_sql) or die(mysqli_error($mysqli));

			   if (mysqli_num_rows($get_items_res) < 1) {
               $display_block = "<p><em>Sorry, no items in this category.</em></p>";
            } else {
               $display_block .= "<ul>";

               while ($items = mysqli_fetch_array($get_items_res)) {
                  $item_id  = $items['id'];
                  $item_title = stripslashes($items['item_title']);
                  $item_price = $items['item_price'];

                  $display_block .= "<li><a href=\"showitem.php?item_id=".$item_id."\">".$item_title."</a> (\$".$item_price.")</li>";
                }

				    $display_block .= "</ul>";
			    }

          //free results
          mysqli_free_result($get_items_res);
		   }
	 }
}
//free results
mysqli_free_result($get_cats_res);

//close connection to MySQL
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Categories</title>
</head>
<body>
  <?php echo $display_block; ?>
</body>
</html>

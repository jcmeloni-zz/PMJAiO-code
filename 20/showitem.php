<?php
//connect to database
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

$display_block = "<h1>My Store - Item Detail</h1>";

//create safe values for use
$safe_item_id = mysqli_real_escape_string($mysqli, $_GET['item_id']);

//validate item
$get_item_sql = "SELECT c.id as cat_id, c.cat_title, si.item_title, si.item_price, si.item_desc, si.item_image FROM store_items AS si LEFT JOIN store_categories AS c on c.id = si.cat_id WHERE si.id = '".$safe_item_id."'";
$get_item_res = mysqli_query($mysqli, $get_item_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_item_res) < 1) {
   //invalid item
   $display_block .= "<p><em>Invalid item selection.</em></p>";
} else {
   //valid item, get info
   while ($item_info = mysqli_fetch_array($get_item_res)) {
	   $cat_id = $item_info['cat_id'];
	   $cat_title = strtoupper(stripslashes($item_info['cat_title']));
	   $item_title = stripslashes($item_info['item_title']);
	   $item_price = $item_info['item_price'];
	   $item_desc = stripslashes($item_info['item_desc']);
	   $item_image = $item_info['item_image'];
	}

   //make breadcrumb trail & display of item
   $display_block .= <<<END_OF_TEXT
   <p><em>You are viewing:</em><br>
   <strong><a href="seestore.php?cat_id=$cat_id">$cat_title</a> &gt; $item_title</strong></p>
   <div style="float: left;"><img src="$item_image" alt="$item_title"></div>
   <div style="float: left; padding-left: 12px">
   <p><strong>Description:</strong><br>$item_desc</p>
   <p><strong>Price:</strong> \$$item_price</p>
END_OF_TEXT;

   //free result
   mysqli_free_result($get_item_res);

   //get colors
   $get_colors_sql = "SELECT item_color FROM store_item_color WHERE item_id = '".$safe_item_id."' ORDER BY item_color";
   $get_colors_res = mysqli_query($mysqli, $get_colors_sql) or die(mysqli_error($mysqli));

   if (mysqli_num_rows($get_colors_res) > 0) {
        $display_block .= "<p><strong>Available Colors:</strong><br>";
        while ($colors = mysqli_fetch_array($get_colors_res)) {
           $item_color = $colors['item_color'];
           $display_block .= $item_color."<br>";
       }
   }

   //free result
   mysqli_free_result($get_colors_res);

   //get sizes
   $get_sizes_sql = "SELECT item_size FROM store_item_size WHERE item_id = '".$safe_item_id."' ORDER BY item_size";
   $get_sizes_res = mysqli_query($mysqli, $get_sizes_sql) or die(mysqli_error($mysqli));

   if (mysqli_num_rows($get_sizes_res) > 0) {
       $display_block .= "<p><strong>Available Sizes:</strong><br>";

       while ($sizes = mysqli_fetch_array($get_sizes_res)) {
          $item_size = $sizes['item_size'];
          $display_block .= $item_size."<br>";
       }
   }

   //free result
   mysqli_free_result($get_sizes_res);

   //close up the div
   $display_block .= "</div>";

}
//close connection to MySQL
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Store</title>
</head>
<body>
  <?php echo $display_block; ?>
</body>
</html>

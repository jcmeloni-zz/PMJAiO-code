<?php
//connect to database
$mysqli = mysqli_connect("localhost", "testuser", "somepass", "testDB");

$display_block = "<h1>My Categories</h1>
<p>Scroll through the items in each category.</p>";

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

        $display_block .= "<h2>".$cat_title."</h2>\n<p>".$cat_desc."</p>";

        //get items
        $get_items_sql = "SELECT id, item_title, item_price, item_desc, item_image FROM store_items WHERE cat_id = '".$cat_id."' ORDER BY item_title";
        $get_items_res = mysqli_query($mysqli, $get_items_sql) or die(mysqli_error($mysqli));

        if (mysqli_num_rows($get_items_res) < 1) {
           $display_block = "<p><em>Sorry, no items in this category.</em></p>";
        } else {
           $display_block .= "<section class=\"liquid-slider\" id=\"main-slider-".$cat_id."\">"; 

           while ($items = mysqli_fetch_array($get_items_res)) {
               $item_id  = $items['id'];
               $item_title = stripslashes($items['item_title']);
               $item_price = $items['item_price'];
               $item_img = $items['item_image'];
               $item_desc = $items['item_desc'];

               $display_block .= <<<END_OF_TEXT
<div>
<h2 class="title">$item_title</h2>
<p>
<img src="$item_img" alt="$item_title" style=" float: left; margin-right:0.5rem;">
$item_desc
</p>
<p>Price: \$$item_price</p>
<p><a href="seestore.php?cat_id=$cat_id"><button id="">Buy Now</button></a></p>
</div>
END_OF_TEXT;
            }

             $display_block .= <<<END_OF_TEXT
</section>
<script type="text/javascript">
$(function(){
  $('#main-slider-$cat_id').liquidSlider({
    dynamicTabs: false,
    hoverArrows: false
  });
});
</script>
END_OF_TEXT;

        }
        //free results
        mysqli_free_result($get_items_res);
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
   <link rel="stylesheet" href="liquidslider/css/liquid-slider.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
   <script src="liquidslider/js/jquery.liquid-slider.min.js"></script>
</head>
<body>
  <?php echo $display_block; ?>
</body>
</html>

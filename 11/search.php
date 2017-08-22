<?php
  header("Content-type: text/xml");
  $names = array (
   "John Smith", "John Jones", "Jane Smith", "Jane Tillman",
   "Abraham Lincoln", "Sally Johnson", "Kilgore Trout",
   "Bob Atkinson","Joe Cool", "Dorothy Barnes",
   "Elizabeth Carlson", "Frank Dixon", "Gertrude East",
   "Harvey Frank", "Inigo Montoya", "Jeff Austin",
   "Lynn Arlington", "Michael Washington", "Nancy West" );

echo "<?xml version=\"1.0\" ?>\n";
echo "<names>\n";
while (list($k,$v)=each($names)) {
   if (stristr($v,$_GET['query'])) {
      echo "<name>$v</name>\n";
   }
}
echo "</names>\n";
?>

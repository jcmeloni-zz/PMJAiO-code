<!DOCTYPE html>
<html lang="en">
<head>
   <title>More PHP Embedded Inside HTML</title>
   <style type="text/css">
   table, tr, th, td {
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 3px;
   }
   th {
        font-weight: bold;
   }
   </style>
   </head>
   <body>
   <?php
   $some_condition = true;
   if ($some_condition) {
      echo "<table>
      <tr><th colspan=\"3\">
      Today's Prices
      </th></tr>
      <tr><td>14.00</td><td>32.00</td><td>71.00</td></tr>
      </table>";
    }
    ?>
    </body>
</html>
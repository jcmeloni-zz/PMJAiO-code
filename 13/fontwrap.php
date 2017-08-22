<?php
function fontWrap($txt, $fontsize)
{
    	echo "<span style=\"font-size:".$fontsize."\">".$txt."</span>";
}
fontWrap("really big text<br>","24pt");
fontWrap("some body text<br>","16pt");
fontWrap("smaller body text<br>","12pt");
fontWrap("even smaller body text<br>","10pt");
?>

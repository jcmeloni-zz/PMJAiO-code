<?php
function tagWrap($tag, $txt, $func = "")
{
	if ((!empty($txt)) && (function_exists($func))) {
		$txt = $func($txt);
		return "<".$tag.">".$txt."</".$tag."><br>";
	} else {
		return "<strong>".$txt."</strong><br>";
	}
}

function underline($txt)
{
	return "<span style=\"text-decoration: underline;\">".$txt."</span>";
}

echo tagWrap('strong', 'make me bold');
echo tagWrap('em', 'underline and italicize me', "underline");
echo tagWrap('em', 'make me italic and quote me',
create_function('$txt', 'return "&quot;$txt&quot;";'));
?>

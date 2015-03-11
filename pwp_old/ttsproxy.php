<?php
//$googlettsapi="http://translate.google.com/translate_tts?tl=ko&q=";
$transtext=$_GET['txt'];
$base_url="http://translate.google.com/translate_tts?";
$qs = http_build_query(array(
	'tl' => 'ko',
	'ie' => 'UTF-8',
	'q' => utf8_encode($transtext)
));
$contents=file_get_contents($base_url.$qs);
echo $contents;
?>

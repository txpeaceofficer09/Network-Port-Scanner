<?php

header('Access-Control-Allow-Origin: *');

$origin = ( isset($_SERVER['HTTP_REFERER']) ) ? $_SERVER['HTTP_REFERER'] : '';

function originexists($origin, $origins) {
	if (!empty($origin) && !empty($origins))
	{
		return preg_match('@'.$origin.'@', $origins);
	} else {
		return false;
	}
}

$file = join('', file('origins.txt'));

if (!originexists($origin, $file)) {
	if (!file_exists('origins.txt')) `touch origins.txt`;

	if ($fp=fopen('origins.txt', 'w')) {
		fputs($fp, $file.$origin."\n");
		fclose($fp);
	}
}

$cnt = count(file('iplog.txt'));
echo ( $cnt == 1 ) ? "Downloaded ".$cnt." time." : "Downloaded ".$cnt." times.";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Network Port Scanner</title>
		<link rel="stylesheet" href="stylesheet.css" />
		<script src="scan.js"></script>
	</head>
	
	<body>
		<h1>Network Port Scanner</h1>

		<div class="tabs">

<?php

$tabs = array();

if ($dh=opendir('.')) {
	while (($file = readdir($dh)) !== false) {
		if (preg_match('/^([0-9]{1,2})\-([a-z]{1,25}).php$/i', $file) == 1) {
			array_push($tabs, $file);
		}
	}
	closedir($dh);
}

sort($tabs);

foreach($tabs AS $i=>$tab) {
	preg_match('/^([0-9]{1,2})\-([a-z]{1,25}).php$/i', $tab, $matches);
	echo "\t\t\t<div class=\"tab\">\r\n" .
		"\t\t\t\t<input type=\"radio\" id=\"tab-".($i+1)."\" name=\"tab-group-1\" onClick=\"location.hash = '".$matches[2]."';\">\r\n" .
		"\t\t\t\t<label for=\"tab-".($i+1)."\">".$matches[2]."</label>\r\n\r\n" .
		"\t\t\t\t<div class=\"content\">\r\n";
	require_once($tab);
	echo "\r\n\t\t\t\t</div>\r\n" .
		"\t\t\t</div>\r\n";
}

?>

		</div>

		<div id="google_ads">
			<center><img src="images/ads.png" border="0" /></center>
		</div>

		<footer>
			Copyright &copy; 2013, <a href="http://www.trap-nine.com" target="_new">Trap-Nine.com</a>, All Rights Reserved.
		</footer>
		<script src="tabs.js"></script>
		<script src="resize.js"></script>
	</body>
</html>

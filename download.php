<?php

$files = array(
	'index.php',
	'portcheck.php',
	'dlcnt.php',
	'download.php',
);

// Scan the current directory for files that need to be zipped up for download.
if ($dh=opendir('.'))
{
	while (($file=readdir($dh)) !== false)
	{
		if ( substr($file, 0, 1) != '.' && !is_dir($file) )
		{
			// Add modules.
			if (preg_match('^@([0-9]{1,3})-([a-z0-9_\- ]+).(?:php|html|htm|shtm|shtml|phtml|phtm|php3|cgi|pl|asp?)$@i', $file)) array_push($files, $file);

			// Add all the css, javascript, text and image files.
			if (preg_match('@^([a-z0-9\-_ ]+).(?:js|css|jpg|jpeg|gif|png|bmp|txt?)$@i', $file)) array_push($files, $file);
		}		
	}
	closedir($dh);
}

$i = 1;
$output = "network-port-scanner.php";

while (file_exists($output)) {
	$output = "network-port-scanner".$i.".zip";
	$i++;
}

shell_exec('zip '.$output.' '.join(' ', $files));

if ( file_exists($output) )
{
	header('Content-Type: application/zip');
	header('Content-Disposition: attachment; filename="network-port-scanner.zip"');
	header('Content-length: '.filesize($output));

	readfile($output);

	shell_exec('unlink '.$output);

	$log = join('', file('iplog.txt'));

	if ($fp = fopen('iplog.txt', 'w'))
	{
		fputs($fp, $log.$_SERVER['REMOTE_ADDR']."\n");
		fclose($fp);
	}
} else {
	header('Location: 404.html');
}

?>
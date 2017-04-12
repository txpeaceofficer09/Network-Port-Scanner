<?php

// set_time_limit(10);

$host = ( isset($_REQUEST['host']) ) ? $_REQUEST['host'] : '127.0.0.1';
$port = ( isset($_REQUEST['port']) ) ? intval($_REQUEST['port']) : 53;

if ($sock = @fsockopen($host, $port, $errno, $errstr, 0.01)) {
	$name = ( gethostbyaddr($host) != $host ) ? gethostbyaddr($host) : '';
	$service = ( getservbyport($port, "tcp") ) ? getservbyport($port, "tcp") : 'Unknown';

	$name = ( $name != '' && stristr($name, '.kcisd.local') !== false ) ? stristr($name, '.kcisd.local', true) : $name;
	
	switch ($port) {
		case 21:
			echo "<div class=\"row\"><div class=\"cell\"><a href=\"ftp://".$host.":21\">".$host."</a></div><div class=\"cell\">".$name."</div><div class=\"cell\">".$port."</div><div class=\"cell\">".$service."</div>";
			break;
		
		case 80:
			echo "<div class=\"row\"><div class=\"cell\"><a href=\"http://".$host.":80\">".$host."</a></div><div class=\"cell\">".$name."</div><div class=\"cell\">".$port."</div><div class=\"cell\">".$service."</div>";
			break;
			
		case 443:
			echo "<div class=\"row\"><div class=\"cell\"><a href=\"https://".$host.":443\">".$host."</a></div><div class=\"cell\">".$name."</div><div class=\"cell\">".$port."</div><div class=\"cell\">".$service."</div>";
			break;
			
		default:
			echo "<div class=\"row\"><div class=\"cell\">".$host."</div><div class=\"cell\">".$name."</div><div class=\"cell\">".$port."</div><div class=\"cell\">".$service."</div>";
			break;
	}

	fclose($sock);
}

?>
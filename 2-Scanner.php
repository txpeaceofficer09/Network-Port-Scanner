					<center><b>Range: </b><select id="range">

<?php

$rang = ( isset($_REQUEST['range']) ) ? $_REQUEST['range'] : '';
$ips = array();

if ( stristr(PHP_OS, 'Win') ) {
	exec('ipconfig', $result);
	preg_match_all("/IPv4 Address([ .:]+)([0-9.]+)/i", join("\n", $result), $matches);
	
	foreach ($matches[2] AS $ip) {
		array_push($ips, $ip);
	}
} else {
	exec('ifconfig', $result);
	preg_match_all("/inet addr:([0-9.]+)/i", join("\n", $result), $matches);

	foreach ($matches[1] AS $ip) {
		array_push($ips, $ip);
	}
}

// Put server IPs in manually if we fail to capture any
if (count($ips) == 0) {
	array_push($ips, '192.168.0.0/24');
	array_push($ips, '192.168.1.0/24');
}

foreach ($ips AS $ip) {
	$rng = substr($ip, 0, strripos($ip, "."));
	if ($rng == $rang || substr($_SERVER['REMOTE_ADDR'], 0, strripos($_SERVER['REMOTE_ADDR'], ".")) == $rng) {
		echo "\t\t\t\t\t\t<option value=\"".$rng."\" cidr=\"".substr($ip, strlen($ip)-2)."\" selected>".$ip."</option>\r\n";
	} else {
		echo "\t\t\t\t\t\t<option value=\"".$rng."\" cidr=\"".substr($ip, strlen($ip)-2)."\">".$ip."</option>\r\n";
	}
}

?>
					</select> <input type="button" value="Scan" id="scan-btn" onClick="StartStopScan(this);" /> <span id="status">&nbsp;</span></center>
					<div id="results-container">
						<div id="results">
							<div class="row">
								<div class="header">IP</div>
								<div class="header">Name</div>
								<div class="header">Port</div>
								<div class="header">Service</div>
							</div>
						</div>
					</div>
					<div id="msg">Ready.</div>

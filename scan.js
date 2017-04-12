var active = false;

function startScan() {
	var results = document.getElementById('results');
	var status = document.getElementById('status');
	var msg = document.getElementById('msg');
	var dropdown = document.getElementById('range');
	var container = document.getElementById('results-container');
	var btn = document.getElementById('scan-btn');

	active = true;

	var rang = dropdown.options[dropdown.selectedIndex].value;
	var port;
	var host;
	var server_index = 1;
	var port_index = 0;
	
	var ports = new Array();
	ports[1] = 21; // FTP -- Control
	ports[2] = 22; // SSH Remote Login Protocol
	ports[3] = 23; // Telnet
	ports[4] = 25; // Simple Mail Transfer Protocol (SMTP)
	ports[5] = 37; // Time
	ports[6] = 42; // Host Name Server (Nameserv)
	ports[7] = 53; // Domain Name System (DNS)
	ports[8] = 69; // Trivial File Transfer Protocol (TFTP)
	ports[9] = 80; // HTTP
	ports[10] = 115; // Simple File Transfer Protocol (SFTP)
	ports[11] = 161; // SNMP
	ports[12] = 389; // Lightweight Directory Access Protocol (LDAP)
	ports[13] = 443; // HTTPS

	status.innerHTML = '<img src="ajax-loader.gif" />';
	results.innerHTML = '<div class="row"><div class="header">IP</div><div class="header">Name</div><div class="header">Port</div><div class="header">Service</div></div>';
	msg.innerHTML = 'Scanning ' + rang + '.(1-254) for open ports...Please Wait...';

	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			results.innerHTML += xmlhttp.responseText;

			if (active==false)
			{
				status.innerHTML = '';
				msg.innerHTML = 'Scan aborted.';
				return;
			}

			if ( port_index < ports.length-1 )
			{
				port_index++;
			} else {
				port_index = 0;
				server_index++;
			}

			if ( server_index > 254 )
			{
				status.innerHTML = '';
				msg.innerHTML = 'Done.';
				active = false;
				btn.value = 'Scan';
			} else {
				msg.innerHTML = 'Scanning ' + rang + '.' + server_index + ':' + ports[port_index] + '...Please Wait...';
				xmlhttp.open("GET", 'portcheck.php?host=' + rang + '.' + server_index + '&port=' + ports[port_index], true);
				xmlhttp.send();
			}

			container.scrollTop = container.scrollHeight;
		}
	}

	xmlhttp.open("GET", 'portcheck.php?host=' + rang + '.' + server_index + '&port=' + ports[port_index], true);
	xmlhttp.send();
}

function StartStopScan(btn) {
	if (active==false)
	{
		btn.value = 'Stop';
		startScan();
	} else {
		btn.value = 'Scan';
		active = false;
	}
}

setInterval(function() {
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('dlcnt').innerHTML=xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET", 'dlcnt.php', true);
	xmlhttp.send();
}, 1000);

if (window.location.hash == '') window.location.hash = 'Home';
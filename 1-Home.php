					<section>
						<article>
							<header>How It Works</header>

							<p>Network Port Scanner is an AJAX and PHP based port scanner that scans all systems in the selected
							IP range for commonly used TCP ports that are open.</p>

							<p>It determines the available ranges based on the IP address(es) associated with the server it is
							running on and if the client is in the same range (IE. client <b>192.168.1</b>.100 and server
							<b>192.168.1</b>.2).</p>

							<p>The scanner uses <i>gethostbyaddr()</i> to attempt to determine the name of the host via the IP address
							of the system it is scanning.  Any system that does not have a hostname that <i>gethousebyaddr()</i> can
							find will have no hostname under the "Name" column.</p>

							<p>The scanner iterates over every possible IP in the selected range and attempts to open each TCP port and
							lists the ones that respond.  It does this by making ajax calls to a separate PHP page that checks one port
							at a time and returns the results.  The AJAX iterates over the possible device IPs and for each IP it iterates
							over the ports and makes the request to the PHP page for the information.  Once it receives the response, the
							AJAX switches to the next port/IP and sends the next request.</p>
						</article>
					</section>

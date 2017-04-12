					<section>
						<article>
							<header>Download</header>

							<p>If you agree with the <a href="#License">license</a>, click the "Download" button below to download a copy of the
							source for this site.  The download button builds a zip archive of the live files and starts the download
							of that archive.</p>
							<p align="center"><a href="http://www.trap-nine.com/nps/download.php" class="button">Download</a></p>
							<p align="center" id="dlcnt"><?php echo join('', file('http://www.trap-nine.com/nps/dlcnt.php')); ?></p>
						</article>

						<article>
							<header>Files</header>

							<dl>
								<dt>index.php</dt>
									<dd>The main page which contains all the HTML5 and references to the AJAX and CSS.</dd>
								<dt>portcheck.php</dt>
									<dd>The file that actually checks ports.</dd>
								<dt>1-Home.php</dt>
									<dd>The initial or &quot;home&quot; page.</dd>
								<dt>2-Scanner.php</dt>
									<dd>The scanner.</dd>
								<dt>3-Ports.php</dt>
									<dd>A list of common TCP ports that this scanner looks for.</dd>
								<dt>6-Requirements.php</dt>
									<dd>A general idea of the elements that would be required for the scanner to function on your server.</dd>
								<dt>7-Download.php</dt>
									<dd>This page.</dd>
								<dt>scan.js</dt>
									<dd>The javascript (AJAX) which makes calls to the portcheck.php file.</dd>
								<dt>resize.js</dt>
									<dd>The javascript which resizes elements to make the page fit on lower resolutions.</dd>
								<dt>tabs.js</dt>
									<dd>The javascript which selects which tab we want when the page loads.</dd>
								<dt>stylesheet.css</dt>
									<dd>The CSS that pretties everything up.</dd>
								<dt>ajax-loader.gif</dt>
									<dd>The little animated image that indicates the scanner is running.</dd>
							</dl>
						</article>
					</section>

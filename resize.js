function resizePage() {
	var h1 = document.getElementsByTagName('h1')[0];
	var sections = document.getElementsByTagName('section');
	var body = document.getElementsByTagName('body')[0];
	var footer = document.getElementsByTagName('footer')[0];
	var tabs = document.getElementsByClassName('tabs')[0];
	var results = document.getElementById('results');
	var rContainer = document.getElementById('results-container');
	var msg = document.getElementById('msg');

	var bWidth = ( String(document.body.style.width || document.body.clientWidth).match(/^(\d+)px$/) ) ? Number(String(document.body.style.width || document.body.clientWidth).match(/^(\d+)px$/)[1]) : Number(document.body.style.width || document.body.clientWidth);
	var nWidth = Math.round(window.innerWidth * .8);

	if ( bWidth >= nWidth && nWidth >= 727 && nWidth <= 1000 ) {
		body.style.width = nWidth + 'px';
	} else {
		body.style.width = '1000px';
	}

	body.style.height = window.innerHeight + 'px';

	tabs.style.height = Math.round(Number(window.innerHeight - 280)) + 'px';
	var tWidth = ( String(tabs.style.width || tabs.offsetWidth).match(/^(\d+)px$/) ) ? Number(String(tabs.style.width || tabs.offsetWidth).match(/^(\d+)px$/)[1]) : Number(tabs.style.width || tabs.offsetWidth);

	for (var i=0; i<sections.length; i++) {
		sections[i].style.height = Math.round(Number(window.innerHeight - 280)) - 90 + 'px';
		sections[i].style.width = tWidth - 60 + 'px';
	}

	results.style.width = sections[0].style.width;

	rContainer.style.width = sections[0].style.width;
	rContainer.style.height = Math.round(Number(window.innerHeight - 280)) - 150 + 'px';

	msg.style.width = rContainer.style.width;
}

window.onresize=resizePage;
document.getElementsByTagName('body')[0].onload=resizePage;
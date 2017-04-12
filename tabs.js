var inputs = document.getElementsByTagName('input');
var labels = document.getElementsByTagName('label');
var radios = new Array();

for (var i=0;i<inputs.length;i++)
{
	if (inputs[i].type=='radio')
	{
		radios.push(inputs[i]);
	}
}

for (var i=0;i<radios.length;i++) {
	if (radios[i].type == 'radio')
	{
		if (location.hash == '#' + labels[i].innerHTML)
		{
			radios[i].checked = true;
		}
	}
}

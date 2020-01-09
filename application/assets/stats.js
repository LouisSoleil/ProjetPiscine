	function loadit(element)
{
	var container = document.getElementById('container');
	container.src=element.rel;
	var container2 = document.getElementById('container2');
	container2.src=element.rel;

	var tabs=document.getElementById('tabs').getElementsByTagName("a");
	for (var i=0; i < tabs.length; i++)
	{
		if(tabs[i].rel == element.rel) 
			tabs[i].className="selected";
		else
			tabs[i].className="";
	}
}

function startit()
{
	var tabs=document.getElementById('tabs').getElementsByTagName("a");
	var tabs2=document.getElementById('tabs').getElementsByTagName("OPTION");
	var container = document.getElementById('container');
	var container2 = document.getElementById('container2');
	container.src = tabs[0].rel;
	container2.src = tabs2[0].rel;
}

window.onload = startit;
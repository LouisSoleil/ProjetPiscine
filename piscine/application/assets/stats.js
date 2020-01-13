	function loadit(element)
{
	var container = document.getElementById('container');
	container.src=element.rel;

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
	var container = document.getElementById('container');
	console.log(tabs);
	console.log(tabs.rel);
	container.src = tabs[0].rel;
}

function startit()
{
	var tabs=document.getElementById('tabs').getElementsByTagName("a");
	var container = document.getElementById('container');
	container.src = tabs[0].rel;
}

function startit2()
{
	var tabs2=document.getElementById('tabs2').getElementsByTagName("option");
	var container2 = document.getElementById('container2');
	console.log(tabs2);	
	console.log(tabs2.value);
	container2.src = tabs2[0].value;
}

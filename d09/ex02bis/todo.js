var el = $('#button')[0];
el.addEventListener("click", check);
el.addEventListener("click", todo);
var count = 0;

function check ()
{
	var task = $('#list')[0];
	$('#list').html(decodeURIComponent(getCookie('todo')));
}

function getCookie(name)
{
	var nom = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(nom) == 0) return c.substring(nom.length,c.length);
	}
	return "";
}

function setCookie(name, value, exdays)
{
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = name + "=" + value + "; " + expires;
}

function todo()
{
	var scanf = prompt("On doit faire quoi encore ?");
	if (scanf != "" && scanf != null)
    {
		var container = $('#list')[0];
		var h = document.createTextNode(scanf);	
		var div = document.createElement("div");
		div.appendChild(h);
		div.setAttribute("id", count)
		div.setAttribute("onclick", "del(this)")
		container.insertBefore(div, container.firstChild);
		setCookie('todo', encodeURIComponent(container.innerHTML), 90);
		count++;
	}
}

function del(i)
{
	 if (confirm("T'es sûre que t'as finis ?")) 
	 { 
		var task = $('#list')[0];
		task.removeChild(i);
		setCookie('todo', encodeURIComponent(task.innerHTML), 90);


     }
}
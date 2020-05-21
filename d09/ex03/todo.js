var x = 1;

$(document).ready(function ()
{
	$.getJSON('select.php', function (line)
	{
			Object.keys(line).forEach(key =>
			{
				var k = 1;
				var split = line[key].split(';');
				var id = split[0];
				var todo = split[1];
				$('#list').prepend("<div onclick=del(this) id ="+id+">"+todo+"</div>");
				k++;
				x++;
		 	 });
	})

	$('#button').click(function ()
	{
		var scanf = prompt("On doit faire quoi encore ?");

		if(scanf != "" && scanf != null)
		{
			$.ajax({
				url: 'insert.php',
				type: 'GET',
				data: 'id='+ x +'& todo='+scanf,
				success: function (line)
				{
					var split = line.split(";");
					var id = split[0];
					var todo = split[1];
					$('#list').prepend("<div onclick=del(this) id ="+id+">"+todo+"</div>");
				}
			});
			x++;

		}
	});
});
window.addEventListener("load", function ()
{
	$('.items').each(function ()
	{
		$(this).hide();
	});
	$('.expandItems').each(function ()
	{
		$(this).on("click", function ()
		{
			var target = $(this).data("target");
			if ($('#' + target).is(":visible"))
				$('#' + target).hide();
			else
				$('#' + target).show();
		});
	});
}
, true);
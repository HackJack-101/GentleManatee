function animateProgress()
{
	$('progress').each(function ()
	{
		var progress = $(this);
		if (progress.is(':visible'))
		{
			var interval = parseInt(progress.attr('data-value')) / 15;
			var updatesPerSecond = 1 / 60;
			var animator = function () {
				progress.val(progress.val() + interval);
				if (progress.val() + interval < progress.attr('data-value')) {
					setTimeout(animator, updatesPerSecond);
				} else {
					progress.val(progress.attr('data-value'));
				}
			};
			setTimeout(animator, updatesPerSecond);
		}
	});
}

function displayProgress()
{
	$('progress').each(function ()
	{
		var progress = $(this);
		progress.val(progress.data('value'));
	});
}

function resetProgress()
{
	$('progress').each(function ()
	{
		var progress = $(this);
		progress.val('0');
	});
}

$(document).ready(function () {
	$("input").change(function () {
		if ($(this).is(':checked'))
			$('.' + $(this).data('target')).each(function () {
				$(this).show();
			});
		else
			$('.' + $(this).data('target')).each(function () {
				$(this).hide();
			});
	}).change();
});
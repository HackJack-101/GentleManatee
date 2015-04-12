function mute()
{
	var intro = document.getElementById("introMusic");
	if (intro.paused)
	{
		intro.play();
		document.getElementById("muteMusic").innerHTML = '<span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>';
	}
	else
	{
		intro.pause();
		intro.currentTime = 0;
		document.getElementById("muteMusic").innerHTML = '<span class="glyphicon glyphicon-volume-off" aria-hidden="true"></span>';
	}
	return false;
}

window.addEventListener("load", function ()
{
	var intro = document.getElementById("introMusic");
	intro.volume = 0.5;
}
, true);
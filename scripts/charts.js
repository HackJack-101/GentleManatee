$(window).resize(function () {
	if ($(window).width() > 640)
	{
		$('#mostHatedChampions').highcharts().xAxis[0].options.labels.rotation = 0;
		$('#mostHatedChampions').highcharts().redraw();
		$('#mostLovedChampions').highcharts().xAxis[0].options.labels.rotation = 0;
		$('#mostLovedChampions').highcharts().redraw();
	}
	else
	{
		
		$('#mostHatedChampions').highcharts().xAxis[0].options.labels.rotation = -45;
		$('#mostHatedChampions').highcharts().redraw();
		$('#mostLovedChampions').highcharts().xAxis[0].options.labels.rotation = -45;
		$('#mostLovedChampions').highcharts().redraw();
	}
});



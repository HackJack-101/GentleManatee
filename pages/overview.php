<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/globalstats.php';

?>
<script type="text/javascript">
	$(document).ready(function () {
		//Highcharts.setOptions({colors: ['#a90008', '#7d6241', '#bdbdbd', '#ebdd8d', '#356562', '#32a6d6', '#D7DADB', '#c0edeb']});
		$('#mostHatedChampions').highcharts({
			chart: {
				type: 'column',
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			title: {
				text: 'Most Hated Champions'
			},
			xAxis: {
				categories: ["<?php echo implode('","', $mostBansNames); ?>"],
				labels: {
					useHTML: true,
					style: {
						verticalAlign: 'middle',
						textAlign: 'center',
						display: 'block'
					}
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Percentage games banned (%)'
				},
				stackLabels: {
					enabled: true,
					style: {
						fontWeight: 'bold',
						color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
					},
					formatter: function () {
						return this.total + ' %';
					}
				}
			},
			credits: {
				enabled: false
			},
			legend: {
				align: 'right',
				x: -30,
				verticalAlign: 'top',
				y: 25,
				floating: true,
				backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
				borderColor: '#CCC',
				borderWidth: 1,
				shadow: false
			},
			tooltip: {
				enabled: false,
			},
			plotOptions: {
				column: {
					stacking: 'normal',
					dataLabels: {
						enabled: true,
						allowOverlap: true,
						color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
						style: {
							textShadow: '0 0 3px black'
						},
						formatter: function () {
							return this.y + ' %';
						}
					}
				}
			},
			series: []
		});
		$(function () {
			$('#mostLovedChampions').highcharts({
				chart: {
					type: 'column',
					backgroundColor: 'rgba(255,255,255,0.55)'
				},
				title: {
					text: 'Most Loved Champions'
				},
				xAxis: {
					categories: ["<?php echo implode('","', $mostPicksNames); ?>"],
					labels: {
						useHTML: true,
						style: {
							verticalAlign: 'middle',
							textAlign: 'center',
							display: 'block'
						}
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Popularity (%)'
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						},
						formatter: function () {
							return this.total + ' %';
						}
					}
				},
				tooltip: {
					enabled: false,
				},
				credits: {
					enabled: false
				},
				plotOptions: {
					column: {
						stacking: 'normal',
					}
				},
				series: []
			});
		});
		$('#allRankingChart').highcharts({
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45
				},
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			colors: ['#898FF0', '#7D6951', '#bdbdbd', '#EBDD54', '#356562', '#32a6d6', '#D7DADB', '#c0edeb'],
			credits: {
				enabled: false
			},
			title: {
				text: 'Who plays ?'
			},
			subtitle: {
				text: 'Highest ranking in S4'
			},
			plotOptions: {
				pie: {
					innerSize: 200,
					depth: 20
				}
			},
			series: [{
					name: 'Percentage',
					data: [
						['Unranked',<?php echo $all_ranking->unranked ?>],
						['Bronze',<?php echo $all_ranking->bronze ?>],
						['Silver',<?php echo $all_ranking->silver ?>],
						['Gold',<?php echo $all_ranking->gold ?>],
						['Platinum',<?php echo $all_ranking->platinum ?>],
						['Diamond',<?php echo $all_ranking->diamond ?>],
						['Master',<?php echo $all_ranking->master ?>],
						['Challenger',<?php echo $all_ranking->challenger ?>]
					]
				}]
		});
		$('#teamBlueRedChart').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
			},
			colors: ['#EA3F50', '#3838D1'],
			credits: {
				enabled: false
			},
			title: {
				text: 'Blue or Red Team ?'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y}</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						distance: -50,
						enabled: true,
						crop: true,
						format: '<b>{point.name}</b> :<br/>{point.percentage:.2f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			series: [{
					type: 'pie',
					name: 'Wins',
					data: [
						['Red Team', <?php echo $teams_data->red->wins ?>],
						['Blue Team', <?php echo $teams_data->blue->wins ?>]
					]
				}]
		});
		setTimeout(function () {
			$('#mostLovedChampions').highcharts().addSeries({
				name: 'Popularity',
				data: [<?php echo implode(',', $mostPicksSeries); ?>],
				showInLegend: false
			});
		}, 250);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'First ban', data: [<?php echo implode(',', $mostBansSeries[1]); ?>]});
		}, 500);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'Second ban', data: [<?php echo implode(',', $mostBansSeries[2]); ?>]});
		}, 1000);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'Third ban', data: [<?php echo implode(',', $mostBansSeries[3]); ?>]});
		}, 1500);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'Fourth ban', data: [<?php echo implode(',', $mostBansSeries[4]); ?>]});
		}, 2000);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'Fifth ban', data: [<?php echo implode(',', $mostBansSeries[5]); ?>]});
		}, 2500);
		setTimeout(function () {
			$('#mostHatedChampions').highcharts().addSeries({name: 'Sixth ban', data: [<?php echo implode(',', $mostBansSeries[6]); ?>]});
		}, 3000);
	});
</script>

<div class="row">
	<div class="col-md-12">
		<br/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="mostLovedChampions" style="height: 300px; margin: 0 auto"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<br/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="mostHatedChampions" style="min-width: 310px; height: 450px; margin: 0 auto"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<br/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="allRankingChart"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<br/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2>Winners</h2>
	</div>
</div>
<div class="row">
	<?php
	foreach ($winners as $key => $value)
	{
		$champ_info = $champions_info->$key;
		?>
		<div class="col-md-2 col-xs-3">
			<a class="thumbnail" href="/champions/<?php echo $champ_info->name; ?>">
				<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $champ_info->key; ?>.png" alt="<?php echo $champ_info->name; ?>" class="portrait"/>
				<div class="caption center">
					<?php echo $champ_info->name; ?><br/>
					<b><?php echo round($value * 100, 2); ?>%</b>
				</div>
			</a>
		</div>
		<?php
	}
	?>
</div>
<div class="row">
	<div class="col-md-12">
		<h2>Losers</h2>
	</div>
</div>
<div class="row">
	<?php
	foreach ($losers as $key => $value)
	{
		$champ_info = $champions_info->$key;
		?>
		<div class="col-md-2 col-xs-3">
			<a class="thumbnail" href="/champions/<?php echo $champ_info->name; ?>">
				<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $champ_info->key; ?>.png" alt="<?php echo $champ_info->name; ?>" class="portrait"/>
				<div class="caption" style="text-align: center">
					<?php echo $champ_info->name; ?><br/>
					<b><?php echo round($value * 100, 2); ?>%</b>
				</div>
			</a>
		</div>
		<?php
	}
	?>
</div>
<?php
$games = $teams_data->red->wins + $teams_data->blue->wins;
?>
<div class="row">
	<div class="col-md-6">
		<div id="teamBlueRedChart"></div>
	</div>
	<div class="col-md-6 thumbnail">
		<ul>
			<li><b><?php echo $games ?></b> URF games saved</li>
			<li>In <b><?php echo round(($teams_data->red->winWithFirstTower + $teams_data->red->winWithFirstTower) / $games * 100, 2); ?>%</b> games, the team, who takes the first <b>tower</b>, wins.</li>
			<li>In <b><?php echo round(($teams_data->red->winWithFirstDragon + $teams_data->red->winWithFirstDragon) / $games * 100, 2); ?>%</b> games, the team, who takes the first <b>dragon</b>, wins.</li>
			<li>In <b><?php echo round(($teams_data->red->winWithFirstBaron + $teams_data->red->winWithFirstBaron) / $games * 100, 2); ?>%</b> games, the team, who takes the first <b>baron</b>, wins.</li>
		</ul>
	</div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
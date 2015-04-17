<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/globalstats.php';

$games = $teams_data->red->wins + $teams_data->blue->wins;
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
				text: 'Who played ?'
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
				plotShadow: false,
				backgroundColor: 'rgba(255,255,255,0.55)'
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

		$('#dragonChart').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			colors: ['#EA3F50', '#3838D1'],
			credits: {
				enabled: false
			},
			title: {
				text: 'Winner teams with first Drake'
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
						['Taken', <?php echo $teams_data->red->winWithFirstDragon + $teams_data->red->winWithFirstDragon ?>],
						['Nope', <?php echo $games - ($teams_data->red->winWithFirstDragon + $teams_data->red->winWithFirstDragon) ?>]
					]
				}]
		});
		$('#towerChart').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			colors: ['#EA3F50', '#3838D1'],
			credits: {
				enabled: false
			},
			title: {
				text: 'Winner teams with first tower'
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
						['Taken', <?php echo $teams_data->red->winWithFirstTower + $teams_data->red->winWithFirstTower ?>],
						['Nope', <?php echo $games - ($teams_data->red->winWithFirstTower + $teams_data->red->winWithFirstTower) ?>]
					]
				}]
		});
		$('#baronChart').highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			colors: ['#EA3F50', '#3838D1'],
			credits: {
				enabled: false
			},
			title: {
				text: 'Winner teams with first Nashor'
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
						['Taken', <?php echo $teams_data->red->winWithFirstBaron + $teams_data->red->winWithFirstBaron ?>],
						['Nope', <?php echo $games - ($teams_data->red->winWithFirstBaron + $teams_data->red->winWithFirstBaron) ?>]
					]
				}]
		});
		$('#damagesDealt').highcharts({
			chart: {
				type: 'column',
				backgroundColor: 'rgba(255,255,255,0.55)'
			},
			title: {
				text: 'TONS of Damage dealt to champions'
			},
			xAxis: {
				categories: ["Ability Power", "Attack Damage", "True Damage"],
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
					text: 'TONS of Damage'
				},
				stackLabels: {
					enabled: true,
					style: {
						fontWeight: 'bold',
						color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
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

		setTimeout(function () {
			$('#mostLovedChampions').highcharts().addSeries({
				name: 'Popularity',
				data: [<?php echo implode(',', $mostPicksSeries); ?>],
				showInLegend: false
			});
		}, 250);
		setTimeout(function () {
			$('#damagesDealt').highcharts().addSeries({
				name: 'Damages',
				data: [<?php echo implode(',', $damagesDealt); ?>],
				showInLegend: false
			});
		}, 500);
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

<div class="row statsChart">
	<div class="col-md-12">
		<div id="mostLovedChampions" style="height: 300px; margin: 0 auto"></div>
	</div>
</div>
<div class="row statsChart">
	<div class="col-md-12">
		<div id="mostHatedChampions" style="min-width: 310px; height: 450px; margin: 0 auto"></div>
	</div>
</div>
<div class="row statsChart">
	<div class="col-md-12">
		<div id="allRankingChart"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2 class="center">Winners</h2>
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
		<h2 class="center">Losers</h2>
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
<div class="row">
	<div class="col-md-12">
		<h2 class="center">Global Statistics</h2>
	</div>
</div>
<div class="row littleCharts">
	<div class="col-md-3">
		<div id="teamBlueRedChart"></div>
	</div>
	<div class="col-md-3">
		<div id="dragonChart"></div>
	</div>
	<div class="col-md-3">
		<div id="towerChart"></div>
	</div>
	<div class="col-md-3">
		<div id="baronChart"></div>
	</div>
</div>
<div class="row statsChart">
	<div class="col-md-12">
		<div id="damagesDealt"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 center" id="summaryStats">
		<b><?php echo $games ?></b> URF games are analyzed.<br/>
		The longest game lasted 
		<b>
			<?php
			$dt			 = new DateTime();
			$dt->add(new DateInterval('PT' . $matchs_data->maxDuration . 'S'));
			$interval	 = $dt->diff(new DateTime());
			echo $interval->format("%h hours %i minutes and %s seconds");
			?>
		</b>.<br/>
		The shortest game lasted 
		<b>
			<?php
			$dt			 = new DateTime();
			$dt->add(new DateInterval('PT' . $matchs_data->minDuration . 'S'));
			$interval	 = $dt->diff(new DateTime());
			echo $interval->format("%i minutes and %s seconds");
			?>
		</b>.<br/>
		The average URF game lasts 
		<b>
			<?php
			$dt			 = new DateTime();
			$dt->add(new DateInterval('PT' . round($matchs_data->cumulatedDuration / $matchs_data->played) . 'S'));
			$interval	 = $dt->diff(new DateTime());
			echo $interval->format("%i minutes and %s seconds");
			?>
		</b>.
	</div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
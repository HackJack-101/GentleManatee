<?php
if (empty($html_title))
	$html_title = 'Home';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GentleManatee - <?php echo $html_title ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

		<link href="/favicon.png" type="image/png" rel="icon" />
		<link href="/favicon.png" type="image/png" rel="shortcut icon" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="/libraries/DoughnutChart/style.css"/> 
		<link rel="stylesheet" href="/style/main.css" type="text/css"/>

		<meta name="description" content="URF URF URF"/>
        <meta name="keywords" content="URF, Manatee, Gentleman"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<meta property="og:locale" content="en_US"/>
        <meta property="og:image" content="http://challenge.hackjack.info/favicon.png"/>

		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="/libraries/tablesorter/jquery.tablesorter.js"></script> 
		<script type="text/javascript" src="/libraries/DoughnutChart/jquery.drawDoughnutChart.js"></script> 
		<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
		<script type="text/javascript" src="http://code.highcharts.com/highcharts-3d.js"></script>
		<script type="text/javascript" src="http://code.highcharts.com/highcharts-3d.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="/scripts/champions.js"></script> 
		<script type="text/javascript" src="/scripts/charts.js"></script> 
		<script type="text/javascript" src="/scripts/items.js"></script> 
		<script type="text/javascript">
			$(document).ready(function ()
			{
				$("#statistics").tablesorter();
			}
			);
		</script>
	</head>
	<body>
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/menu.php'; ?>
		<div class="container" id="main">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/api_key.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/ranking.php';

$champions_cache_server = '../cache/server/champions.json';
$champions_cache_api = '../cache/api/champions.json';
$region = 'euw';

if (!file_exists($champions_cache_server))
{
	$url_champions = $server_url . 'Champions';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$champions = array();
	foreach ($content->data as $champ)
	{
		if (!empty($champ->championId) && !empty($champ->played))
			$champions[$champ->championId] = $champ;
	}
	ksort($champions);

	file_put_contents($champions_cache_server, json_encode($champions));
}

$champions_data = file_get_contents($champions_cache_server);
$champions_data = json_decode($champions_data);

if (!file_exists($champions_cache_api))
{
	$url_champions = 'https://global.api.pvp.net/api/lol/static-data/' . $region . '/v1.2/champion?api_key=' . $apiKey;
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$champions = array();
	foreach ($content->data as $champ)
	{
		$champions[$champ->id] = array("name" => $champ->name, "key" => $champ->key);
	}
	file_put_contents($champions_cache_api, json_encode($champions));
}

$champions_info = file_get_contents($champions_cache_api);
$champions_info = json_decode($champions_info);

if (empty($_GET['name']))
	die('NURF');

$id = 0;
foreach ($champions_info as $key => $value)
{
	if ($value->name == $_GET['name'])
		$id = $key;
}

if ($key == 0)
	die('NURF');


$html_title = $champions_info->$id->name;
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';


echo '<pre style="display: none;">';
print_r($champions_data->$id);
echo '</pre><pre style="display: none;">';
print_r($champions_ranking->$id);
echo '</pre>';
?>
<script type="text/javascript">
	$(function () {
		$("#rankingChart").drawDoughnutChart([
			{title: "Unranked", value: <?php echo $champions_ranking->$id->unranked ?>, color: "#a90008"},
			{title: "Bronze", value: <?php echo $champions_ranking->$id->bronze ?>, color: "#7d6241"},
			{title: "Silver", value: <?php echo $champions_ranking->$id->silver ?>, color: "#bdbdbd"},
			{title: "Gold", value: <?php echo $champions_ranking->$id->gold ?>, color: "#ebdd8d"},
			{title: "Platinum", value: <?php echo $champions_ranking->$id->platinum ?>, color: "#356562"},
			{title: "Diamond", value: <?php echo $champions_ranking->$id->diamond ?>, color: "#32a6d6"},
			{title: "Master", value: <?php echo $champions_ranking->$id->master ?>, color: "#D7DADB"},
			{title: "Challenger", value: <?php echo $champions_ranking->$id->challenger ?>, color: "#c0edeb"}
		]);
	});
</script>

<div class="row">
	<div class="col-md-12">
		<h1><?php echo $champions_info->$id->name ?></h1>
	</div>
</div>
<div class="row">
	<div id="rankingChart"  class="col-md-4 chart"></div>
	<div class="col-md-7 col-md-offset-1">
		<div class="row">
			<div class="col-xs-4">Matches played: </div>
			<div class="col-xs-8"><?php echo $champions_data->$id->played ?></div>
		</div>
		<div class="row">
			<div class="col-xs-4">Kills: </div>
			<div class="col-xs-8"><?php echo $champions_data->$id->cumulatedKills ?></div>
		</div>
		<div class="row">
			<div class="col-xs-4">Kills by match: </div>
			<div class="col-xs-8"><?php echo round($champions_data->$id->cumulatedKills / $champions_data->$id->played, 1); ?></div>
		</div>
		<div class="row">
			<div class="col-xs-4">Max Kills: </div>
			<div class="col-xs-8"><?php echo $champions_data->$id->maxKills ?></div>
		</div>
	</div>
</div>


<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
$matchs_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/matchs.json';

if (!file_exists($matchs_cache_server))
{
	$url_champions = $server_url . 'Matchs';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$matchs = $content->data[0];

	file_put_contents($matchs_cache_server, json_encode($matchs));
}

$matchs_data = file_get_contents($matchs_cache_server);
$matchs_data = json_decode($matchs_data);

$bans = array();
foreach ($champions_data as $champion)
{
	$totalBans = $champion->banAtSixthTurn + $champion->banAtFifthTurn + $champion->banAtFourthTurn + $champion->banAtThirdTurn + $champion->banAtSecondTurn + $champion->banAtFirstTurn;
	$bans[$champion->championId] = $totalBans;
}
arsort($bans);

$mostBans = array_slice($bans, 0, 8, true);
$mostBansNames = array();
$mostBansSeries = array();
foreach ($mostBans as $key => $value)
{
	$champ_data = $champions_data->$key;
	$champ_info = $champions_info->$key;

	$mostBansNames[] = addslashes('<a href="/champions/' . $champ_info->name . '" class="labelchart"><img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/' . $champ_info->key . '.png"/>' . $champ_info->name . '</a>');

	$mostBansSeries[6][] = round($champ_data->banAtSixthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[5][] = round($champ_data->banAtFifthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[4][] = round($champ_data->banAtFourthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[3][] = round($champ_data->banAtThirdTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[2][] = round($champ_data->banAtSecondTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[1][] = round($champ_data->banAtFirstTurn / $matchs_data->played * 100, 1);
}
?>

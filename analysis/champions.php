<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/debug.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/api_key.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/objects/Stats.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';

$champions_cache_server	 = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/champions.json';
$champions_cache_api	 = $_SERVER['DOCUMENT_ROOT'] . '/cache/api/champions.json';
$region					 = 'euw';

if (!file_exists($champions_cache_server))
{
	$url_champions = $server_url . 'Champions';

	$curl	 = curl_init();
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

$champions_data	 = file_get_contents($champions_cache_server);
$champions_data	 = json_decode($champions_data);

if (!file_exists($champions_cache_api))
{
	$url_champions = 'https://global.api.pvp.net/api/lol/static-data/' . $region . '/v1.2/champion?version=5.6.1&api_key=' . $apiKey;

	$curl	 = curl_init();
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

$champions_info	 = file_get_contents($champions_cache_api);
$champions_info	 = json_decode($champions_info);

$totalplayed	 = 0;
$stats			 = new Stats();
$damagesDealt	 = array(
	"AP"	 => 0,
	"AD"	 => 0,
	"True"	 => 0
);
foreach ($champions_data as $champion)
{
	foreach ($champion as $key => $value)
	{
		$stats->setMax($key, $value);
		$stats->setMin($key, $value);
	}
	$totalBans	 = $champion->banAtSixthTurn + $champion->banAtFifthTurn + $champion->banAtFourthTurn + $champion->banAtThirdTurn + $champion->banAtSecondTurn + $champion->banAtFirstTurn;
	$stats->setMax('averageMaxCriticalStrike', round($champion->cumulatedMaxCriticalStrike / $champion->played));
	$stats->setMin('averageMaxCriticalStrike', round($champion->cumulatedMaxCriticalStrike / $champion->played));
	$stats->setMax('averageCumulatedTotalDamageTaken', round($champion->cumulatedTotalDamageTaken / $champion->played));
	$stats->setMin('averageCumulatedTotalDamageTaken', round($champion->cumulatedTotalDamageTaken / $champion->played));
	$stats->setMax('averageCumulatedAssists', round($champion->cumulatedAssists / $champion->played));
	$stats->setMin('averageCumulatedAssists', round($champion->cumulatedAssists / $champion->played));
	$stats->setMax('averageCumulatedDeaths', round($champion->cumulatedDeaths / $champion->played));
	$stats->setMin('averageCumulatedDeaths', round($champion->cumulatedDeaths / $champion->played));
	$stats->setMax('averageCumulatedKills', round($champion->cumulatedKills / $champion->played));
	$stats->setMin('averageCumulatedKills', round($champion->cumulatedKills / $champion->played));
	$stats->setMax('averageKDA', round(($champion->cumulatedKills / $champion->played + $champion->cumulatedAssists / $champion->played) / ($champion->cumulatedDeaths / $champion->played)), 2);
	$stats->setMin('averageKDA', round(($champion->cumulatedKills / $champion->played + $champion->cumulatedAssists / $champion->played) / ($champion->cumulatedDeaths / $champion->played)), 2);
	$stats->setMax('averageCumulatedTotalDamageDealtToChampions', round($champion->cumulatedTotalDamageDealtToChampions / $champion->played));
	$stats->setMin('averageCumulatedTotalDamageDealtToChampions', round($champion->cumulatedTotalDamageDealtToChampions / $champion->played));
	$stats->setMax('averageCumulatedTotalHeal', round($champion->cumulatedTotalHeal / $champion->played));
	$stats->setMin('averageCumulatedTotalHeal', round($champion->cumulatedTotalHeal / $champion->played));
	$stats->setMax('averageCumulatedUnitsHealed', round($champion->cumulatedUnitsHealed / $champion->played));
	$stats->setMin('averageCumulatedUnitsHealed', round($champion->cumulatedUnitsHealed / $champion->played));
	$stats->setMax('averageCumulatedTowerKills', round($champion->cumulatedTowerKills / $champion->played, 2));
	$stats->setMin('averageCumulatedTowerKills', round($champion->cumulatedTowerKills / $champion->played, 2));
	$stats->setMax('averageCumulatedInhibitorKills', round($champion->cumulatedInhibitorKills / $champion->played, 2));
	$stats->setMin('averageCumulatedInhibitorKills', round($champion->cumulatedInhibitorKills / $champion->played, 2));
	$stats->setMax('totalBans', $totalBans);
	$stats->setMin('totalBans', $totalBans);
	$stats->count('played', $champion->played);
	$totalplayed = $totalplayed + $champion->played;
	$damagesDealt["AP"] += $champion->cumulatedMagicDamageDealtToChampions;
	$damagesDealt["AD"] += $champion->cumulatedPhysicalDamageDealtToChampions;
	$damagesDealt["True"] += $champion->cumulatedTrueDamageDealtToChampions;
}
//echo $totalplayed;
?>
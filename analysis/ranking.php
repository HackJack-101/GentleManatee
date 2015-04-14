<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/objects/ChampionRanking.php';
$champions_ranking_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/champions_ranking.json';

if (!file_exists($champions_ranking_cache_server))
{
	$url_champions = $server_url . 'ChampionPlayerRanks';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$champions = array();
	foreach ($content->data as $champ)
	{
		if (!empty($champ->championId) && !empty($champ->value))
		{
			if (empty($champions[$champ->championId]))
				$champions[$champ->championId] = new ChampionRanking($champ->championId);
			$champions[$champ->championId]->setPlayed($champ->playerRankId, $champ->value);
		}
	}
	ksort($champions);
	file_put_contents($champions_ranking_cache_server, json_encode($champions));
}

$champions_ranking = file_get_contents($champions_ranking_cache_server);
$champions_ranking = json_decode($champions_ranking);

?>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/objects/ChampionLanes.php';
$lanes_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/lanes.json';

if (!file_exists($lanes_cache_server))
{
	$url_champions = $server_url . 'ChampionLanes';
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
				$champions[$champ->championId] = new ChampionLanes($champ->championId);
			$champions[$champ->championId]->setLane($champ->laneId, $champ->value);
		}
	}
	ksort($champions);

	file_put_contents($lanes_cache_server, json_encode($champions));
}

$lanes_data = file_get_contents($lanes_cache_server);
$lanes_data = json_decode($lanes_data);

?>
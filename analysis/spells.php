<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/api_key.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';

$region							 = 'euw';
$champions_spells_cache_server	 = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/champions_spells.json';
$spells_cache_api				 = $_SERVER['DOCUMENT_ROOT'] . '/cache/api/spells.json';

if (!file_exists($champions_spells_cache_server))
{
	$url_champions	 = $server_url . 'ChampionSpells';
	$curl			 = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content		 = curl_exec($curl);
	$content		 = json_decode($content);

	$champions_spells = array();
	foreach ($content->data as $champ)
	{
		if (!empty($champ->championId) && !empty($champ->value))
		{
			if (empty($champions_spells[$champ->championId]))
				$champions_spells[$champ->championId]					 = array();
			$champions_spells[$champ->championId][$champ->spellId]	 = $champ->value;
		}
	}
	ksort($champions_spells);
	file_put_contents($champions_spells_cache_server, json_encode($champions_spells));
}

$champions_spells	 = file_get_contents($champions_spells_cache_server);
$champions_spells	 = json_decode($champions_spells);

if (!file_exists($spells_cache_api))
{
	$url_spells = 'https://global.api.pvp.net/api/lol/static-data/' . $region . '/v1.2/summoner-spell?api_key=' . $apiKey;

	$curl	 = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_spells);
	curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$spells = array();
	foreach ($content->data as $spell)
	{
		$spells[$spell->id] = array("name" => $spell->name, "key" => $spell->key);
	}
	file_put_contents($spells_cache_api, json_encode($spells));
}

$spells_info = file_get_contents($spells_cache_api);
$spells_info = json_decode($spells_info);
?>
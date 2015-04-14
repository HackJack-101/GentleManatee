<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/api_key.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';

$region							 = 'euw';
$champions_items_cache_server	 = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/champions_items.json';
$items_cache_api				 = $_SERVER['DOCUMENT_ROOT'] . '/cache/api/items.json';

if (!file_exists($champions_items_cache_server))
{
	$url_champions	 = $server_url . 'ChampionItems';
	$curl			 = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content		 = curl_exec($curl);
	$content		 = json_decode($content);

	$champions_items = array();
	foreach ($content->data as $champ)
	{
		if (!empty($champ->championId) && !empty($champ->value))
		{
			if (empty($champions_items[$champ->championId]))
				$champions_items[$champ->championId]				 = array();
			$champions_items[$champ->championId][$champ->itemId] = $champ->value;
		}
	}
	ksort($champions_items);
	file_put_contents($champions_items_cache_server, json_encode($champions_items));
}

$champions_items = file_get_contents($champions_items_cache_server);
$champions_items = json_decode($champions_items);

if (!file_exists($items_cache_api))
{
	$url_items = 'https://global.api.pvp.net/api/lol/static-data/' . $region . '/v1.2/item?itemListData=all&version=5.6.1&api_key=' . $apiKey;

	$curl	 = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_items);
	curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$items = array();
	foreach ($content->data as $item)
	{
		$items[$item->id] = array(
			"name"		 => $item->name,
			"key"		 => $item->id,
			"depth"		 => (!empty($item->depth)) ? $item->depth : 1,
			"boots"		 => (!empty($item->tags)) ? in_array("Boots", $item->tags) : 0,
			"trinket"	 => (!empty($item->tags)) ? in_array("Trinket", $item->tags) : 0,
			"consumable" => (!empty($item->tags)) ? in_array("Consumable", $item->tags) : 0
		);
	}
	file_put_contents($items_cache_api, json_encode($items));
}

$items_info	 = file_get_contents($items_cache_api);
$items_info	 = json_decode($items_info);
?>
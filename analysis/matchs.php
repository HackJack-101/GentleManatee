<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
$matchs_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/matchs.json';

if (!file_exists($matchs_cache_server))
{
	$url_champions	 = $server_url . 'Matchs';
	$curl			 = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_champions);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content		 = curl_exec($curl);
	$content		 = json_decode($content);

	$matchs = $content->data[0];

	file_put_contents($matchs_cache_server, json_encode($matchs));
}

$matchs_data = file_get_contents($matchs_cache_server);
$matchs_data = json_decode($matchs_data);
?>
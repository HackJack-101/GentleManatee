<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
$teams_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/teams.json';

if (!file_exists($teams_cache_server))
{
	$url_teams = $server_url . 'Teams';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_teams);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$content = curl_exec($curl);
	$content = json_decode($content);

	$teams = array();
	foreach ($content->data as $team)
	{
		switch ($team->teamId)
		{
			case 100:
				$teams['blue'] = $team;
				break;
			case 200:
			default:
				$teams['red'] = $team;
				break;
		}
	}
	file_put_contents($teams_cache_server, json_encode($teams));
}

$teams_data = file_get_contents($teams_cache_server);
$teams_data = json_decode($teams_data);
?>

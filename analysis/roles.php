<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/objects/ChampionRoles.php';
$roles_cache_server = $_SERVER['DOCUMENT_ROOT'] . '/cache/server/roles.json';

if (!file_exists($roles_cache_server))
{
	$url_champions = $server_url . 'ChampionRoles';
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
				$champions[$champ->championId] = new ChampionRoles($champ->championId);
			$champions[$champ->championId]->setRole($champ->roleId, $champ->value);
		}
	}
	ksort($champions);

	file_put_contents($roles_cache_server, json_encode($champions));
}

$roles_data = file_get_contents($roles_cache_server);
$roles_data = json_decode($roles_data);
?>

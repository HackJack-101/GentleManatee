<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/matchs.php';

$bans = array();
foreach ($champions_data as $champion)
{
	$totalBans					 = $champion->banAtSixthTurn + $champion->banAtFifthTurn + $champion->banAtFourthTurn + $champion->banAtThirdTurn + $champion->banAtSecondTurn + $champion->banAtFirstTurn;
	$bans[$champion->championId] = $totalBans;
}
arsort($bans);

$mostBans		 = array_slice($bans, 0, 8, true);
$mostBansNames	 = array();
$mostBansSeries	 = array();
foreach ($mostBans as $key => $value)
{
	$champ_data	 = $champions_data->$key;
	$champ_info	 = $champions_info->$key;

	$mostBansNames[] = addslashes('<a href="/champions/' . $champ_info->name . '" class="labelchart"><img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/' . $champ_info->key . '.png"/>' . $champ_info->name . '</a>');

	$mostBansSeries[6][] = round($champ_data->banAtSixthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[5][] = round($champ_data->banAtFifthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[4][] = round($champ_data->banAtFourthTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[3][] = round($champ_data->banAtThirdTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[2][] = round($champ_data->banAtSecondTurn / $matchs_data->played * 100, 1);
	$mostBansSeries[1][] = round($champ_data->banAtFirstTurn / $matchs_data->played * 100, 1);
}
?>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/champions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/bans.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/ranking.php';

$picks = array();
$winrates_desc = array();
$winrates_asc = array();
foreach ($champions_data as $champion)
{
	$picks[$champion->championId] = $champion->played;
	$winrates_desc[$champion->championId] = $champion->wins / $champion->played;
	$winrates_asc[$champion->championId] = $champion->wins / $champion->played;
}
arsort($picks);
arsort($winrates_desc);
asort($winrates_asc);
$mostPicks = array_slice($picks, 0, 10, true);
$winners = array_slice($winrates_desc, 0, 12, true);
$losers = array_slice($winrates_asc, 0, 12, true);
$mostPicksNames = array();
$mostPicksSeries = array();
foreach ($mostPicks as $key => $value)
{
	$champ_data = $champions_data->$key;
	$champ_info = $champions_info->$key;
	$mostPicksNames[] = addslashes('<a href="/champions/' . $champ_info->name . '" class="labelchart"><img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/' . $champ_info->key . '.png"/>' . $champ_info->name . '</a>');
	$mostPicksSeries[] = round($champ_data->played / $matchs_data->played * 100, 2);
}

$all_ranking = new stdClass();
$players = 0;
foreach ($champions_ranking as $id => $value)
{
	$all_ranking->unranked += $value->unranked;
	$all_ranking->bronze += $value->bronze;
	$all_ranking->silver += $value->silver;
	$all_ranking->gold += $value->gold;
	$all_ranking->platinum += $value->platinum;
	$all_ranking->diamond += $value->diamond;
	$all_ranking->master += $value->master;
	$all_ranking->challenger += $value->challenger;
	$players += $value->unranked + $value->bronze + $value->silver + $value->gold + $value->platinum + $value->diamond + $value->master + $value->challenger;
}
$all_ranking->unranked = round($all_ranking->unranked / $players * 100, 2);
$all_ranking->bronze = round($all_ranking->bronze / $players * 100, 2);
$all_ranking->silver = round($all_ranking->silver / $players * 100, 2);
$all_ranking->gold = round($all_ranking->gold / $players * 100, 2);
$all_ranking->platinum = round($all_ranking->platinum / $players * 100, 2);
$all_ranking->diamond = round($all_ranking->diamond / $players * 100, 2);
$all_ranking->master = round($all_ranking->master / $players * 100, 2);
$all_ranking->challenger = round($all_ranking->challenger / $players * 100, 2);

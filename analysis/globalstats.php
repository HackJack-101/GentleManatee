<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/champions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/bans.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/ranking.php';

/* * ************* Champions picked ************** */
$picks_desc		 = array();
$leastPicks		 = array();
/* * ************* Winrate  ************** */
$winrates_desc	 = array();
$winrates_asc	 = array();
/* * ************* Damage dealt  ************** */
$bestDPS		 = array();
$worstDPS		 = array();
/* * ************* Flat deaths  ************** */
$mostDeaths		 = array();
$mostAvgDeaths	 = array();
$leastAvgDeaths	 = array();

foreach ($champions_data as $champion)
{
	$picks_desc[$champion->championId]		 = $champion->played;
	$leastPicks[$champion->championId]		 = $champion->played;
	$winrates_desc[$champion->championId]	 = $champion->wins / $champion->played;
	$winrates_asc[$champion->championId]	 = $champion->wins / $champion->played;
	$bestDPS[$champion->championId]			 = $champion->cumulatedTotalDamageDealtToChampions / $champion->played;
	$worstDPS[$champion->championId]		 = $champion->cumulatedTotalDamageDealtToChampions / $champion->played;
	$mostDeaths[$champion->championId]		 = $champion->cumulatedDeaths;
	$mostAvgDeaths[$champion->championId]	 = $champion->cumulatedDeaths / $champion->played;
	$leastAvgDeaths[$champion->championId]	 = $champion->cumulatedDeaths / $champion->played;
}

/* * ************* Sorting  ************** */
/* * * descending order ** */
arsort($picks_desc);
arsort($winrates_desc);
arsort($bestDPS);
arsort($mostDeaths);
arsort($mostAvgDeaths);
/* * * ascending order ** */
asort($leastPicks);
asort($winrates_asc);
asort($worstDPS);
asort($leastAvgDeaths);

/* * ************* Slicing  ************** */
$mostPicks	 = array_slice($picks_desc, 0, 10, true);
$winners	 = array_slice($winrates_desc, 0, 12, true);
$losers		 = array_slice($winrates_asc, 0, 12, true);

/* * ************* Extrating series and names   ************** */
$mostPicksNames	 = array();
$mostPicksSeries = array();
foreach ($mostPicks as $key => $value)
{
	$champ_data			 = $champions_data->$key;
	$champ_info			 = $champions_info->$key;
	$mostPicksNames[]	 = addslashes('<a href="/champions/' . $champ_info->name . '" class="labelchart"><img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/' . $champ_info->key . '.png"/>' . $champ_info->name . '</a>');
	$mostPicksSeries[]	 = round($champ_data->played / $matchs_data->played * 100, 2);
}

/* * ************* Sorting data by rank   ************** */
$all_ranking = new stdClass();
$players	 = 0;
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
$all_ranking->unranked	 = round($all_ranking->unranked / $players * 100, 2);
$all_ranking->bronze	 = round($all_ranking->bronze / $players * 100, 2);
$all_ranking->silver	 = round($all_ranking->silver / $players * 100, 2);
$all_ranking->gold		 = round($all_ranking->gold / $players * 100, 2);
$all_ranking->platinum	 = round($all_ranking->platinum / $players * 100, 2);
$all_ranking->diamond	 = round($all_ranking->diamond / $players * 100, 2);
$all_ranking->master	 = round($all_ranking->master / $players * 100, 2);
$all_ranking->challenger = round($all_ranking->challenger / $players * 100, 2);

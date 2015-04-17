<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/debug.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/champions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/items.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/bans.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/ranking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/teams.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/spells.php';

/* * ************* Champions picked ************** */
$picks_desc		 = array();
$leastPicks		 = array();
/* * ************* Winrate  ************** */
$winrates_desc	 = array();
$winrates_asc	 = array();
/* * ************* Damage dealt  ************** */
$bestDPS		 = array();
$worstDPS		 = array();
/* * ************* Damage taken  ************** */
$bestTanking	 = array();
/* * ************* Inhib down  ************** */
$inhib			 = array();
/* * ************* Average Heal  ************** */
$heal			 = array();
$selfHeal		 = array();
/* * ************* Flat deaths  ************** */
$maxDeaths		 = array();
/* * ************* Average deaths  ************** */
$mostAvgDeaths	 = array();
$leastAvgDeaths	 = array();
/* * ************* Average gold  ************** */
$highestGold	 = array();
$leastAvgGold	 = array();
/* * ************* Average Assists  ************** */
$maxAssists	 = array();
/* * ************* Average Wards bought  ************** */
$mostWards		 = array();
/* * ************* Average CC  ************** */
$cc				 = array();
/* * ************* Max minions ************** */
$minions		 = array();
/* * ************* Max killing spree ************** */
$killingSprees	 = array();

foreach ($champions_data as $champion)
{
	$picks_desc[$champion->championId]		 = $champion->played;
	$leastPicks[$champion->championId]		 = $champion->played;
	$winrates_desc[$champion->championId]	 = $champion->wins / $champion->played;
	$winrates_asc[$champion->championId]	 = $champion->wins / $champion->played;
	$bestDPS[$champion->championId]			 = $champion->maxTotalDamageDealtToChampions;
	$worstDPS[$champion->championId]		 = $champion->cumulatedTotalDamageDealtToChampions / $champion->played;
	$maxDeaths[$champion->championId]		 = $champion->maxDeaths;
	$mostAvgDeaths[$champion->championId]	 = $champion->cumulatedDeaths / $champion->played;
	$leastAvgDeaths[$champion->championId]	 = $champion->cumulatedDeaths / $champion->played;
	$bestTanking[$champion->championId]		 = $champion->maxTotalDamageTaken;
	$highestGold[$champion->championId]		 = $champion->maxGoldEarned;
	$leastAvgGold[$champion->championId]	 = $champion->cumulatedGoldEarned / $champion->played;
	$maxAssists[$champion->championId]		 = $champion->maxAssists;
	$mostWards[$champion->championId]		 = ($champion->cumulatedVisionWardsBought + $champion->cumulatedSightWardsBought) / $champion->played;
	$inhib[$champion->championId]			 = $champion->maxInhibitorKills;
	$heal[$champion->championId]			 = 0;
	if ($champion->cumulatedUnitsHealed / $champion->played >= 2) /*	 * * Avoiding self healers like Sion or Zac ** */
		$heal[$champion->championId]			 = $champion->cumulatedTotalHeal / $champion->played;
	$selfHeal[$champion->championId]		 = $champion->maxTotalHeal / round($champion->cumulatedUnitsHealed / $champion->played);
	$cc[$champion->championId]				 = $champion->maxTimeCrowdControlDealt;
	$minions[$champion->championId]			 = $champion->maxMinionKills;
	$killingSprees[$champion->championId]	 = $champion->maxKillingSpree;
}

$lucidityBought = 0;
foreach ($champions_items as $item)
{
	$lucidityIDs = array(3158, 3275, 3276, 3277, 3278, 3279);
	foreach ($lucidityIDs as $id)
		if (!empty($item->$id))
			$lucidityBought += $item->$id;
}

$tearBought = 0;
foreach ($champions_items as $item)
{
	$tearID = 3070;
	if (isset($item->$tearID))
		$tearBought += $item->$tearID;
}

$manaPotionBought = 0;
foreach ($champions_items as $item)
{
	$potionID = 2004;
	if (isset($item->$potionID))
		$manaPotionBought += $item->$potionID;
}

$clarityTaken = 0;
foreach ($champions_spells as $spell)
{
	$clarityID = 13;
	if (isset($spell->$clarityID))
		$clarityTaken += $spell->$clarityID;
}

/* * ************* Sorting  ************** */
/* * * descending order ** */
arsort($picks_desc);
arsort($winrates_desc);
arsort($bestDPS);
arsort($bestTanking);
arsort($inhib);
arsort($heal);
arsort($maxDeaths);
arsort($mostAvgDeaths);
arsort($highestGold);
arsort($maxAssists);
arsort($selfHeal);
arsort($mostWards);
arsort($cc);
arsort($minions);
arsort($killingSprees);
/* * * ascending order ** */
asort($leastPicks);
asort($winrates_asc);
asort($worstDPS);
asort($leastAvgDeaths);
asort($leastAvgGold);

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
?>
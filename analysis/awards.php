<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/globalstats.php';
/* * ************* Reset  ************** */
reset($winners);
reset($losers);
reset($mostPicks);
reset($leastPicks);
reset($mostBans);
reset($bestTanking);
reset($bestDPS);
reset($worstDPS);
reset($mostDeaths);
reset($mostAvgDeaths);
reset($inhib);
reset($heal);
/* * ************* Get the first key  ************** */
$winnerKey		 = key($winners);
$loserKey		 = key($losers);
$famousKey		 = key($mostPicks);
$forgottenKey	 = key($leastPicks);
$bannedKey		 = key($mostBans);
$bestTankKey	 = key($bestTanking);
$bestDealerKey	 = key($bestDPS);
$worstDealerKey	 = key($worstDPS);
$deadBodyKey	 = key($mostDeaths);
$markedManKey	 = key($mostAvgDeaths);
$inhibManKey	 = key($inhib);
$healerKey		 = key($heal);
/* * ************* Extract the data  ************** */
$winner			 = $champions_info->$winnerKey;
$loser			 = $champions_info->$loserKey;
$famous			 = $champions_info->$famousKey;
$forgotten		 = $champions_info->$forgottenKey;
$banned			 = $champions_info->$bannedKey;
$bestTank		 = $champions_info->$bestTankKey;
$bestDealer		 = $champions_info->$bestDealerKey;
$worstDealer	 = $champions_info->$worstDealerKey;
$deadBody		 = $champions_info->$deadBodyKey;
$markedMan		 = $champions_info->$markedManKey;
$inhibMan		 = $champions_info->$inhibManKey;
$healer			 = $champions_info->$healerKey;
?>
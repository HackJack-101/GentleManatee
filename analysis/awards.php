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
reset($maxDeaths);
reset($mostAvgDeaths);
reset($leastAvgGold);
reset($highestGold);
reset($maxAssists);
reset($mostWards);
reset($inhib);
reset($heal);
reset($selfHeal);
reset($cc);
reset($minions);
reset($killingSprees);
/* * ************* Get the first key  ************** */
$winnerKey		 = key($winners);
$loserKey		 = key($losers);
$famousKey		 = key($mostPicks);
$forgottenKey	 = key($leastPicks);
$bannedKey		 = key($mostBans);
$bestTankKey	 = key($bestTanking);
$bestDealerKey	 = key($bestDPS);
$worstDealerKey	 = key($worstDPS);
$deadBodyKey	 = key($maxDeaths);
$markedManKey	 = key($mostAvgDeaths);
$inhibManKey	 = key($inhib);
$healerKey		 = key($heal);
$selfHealerKey	 = key($selfHeal);
$poorGuyKey		 = key($leastAvgGold);
$richGuyKey		 = key($highestGold);
$goodGuyKey		 = key($maxAssists);
$wardKey		 = key($mostWards);
$ccGuyKey		 = key($cc);
$farmerKey		 = key($minions);
$killerGuyKey	 = key($killingSprees);
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
$selfHealer		 = $champions_info->$selfHealerKey;
$poorGuy		 = $champions_info->$poorGuyKey;
$richGuy		 = $champions_info->$richGuyKey;
$goodGuy		 = $champions_info->$goodGuyKey;
$ccGuy			 = $champions_info->$ccGuyKey;
$ward			 = $champions_info->$wardKey;
$farmer			 = $champions_info->$farmerKey;
$killer			 = $champions_info->$killerGuyKey;
?>
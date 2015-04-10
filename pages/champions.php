<?php
$html_title = 'Champions';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/api_key.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/champions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>
<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary"  id="collapseOptionsButton" data-toggle="collapse" href="#collapseOptions" aria-expanded="false" aria-controls="collapseOptions">
			Options
		</a>
	</div>
</div>

<div class="row collapse" id="collapseOptions">
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxDamageDealt" checked="checked"/> Max Damage Dealt
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageTotalDamageDealt" checked="checked"/> Avg. Damage Dealt
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxDamageTaken"/> Max Damage Taken
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageTotalDamageTaken"/> Avg. Damage Taken
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxKills"/> Max Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageKills"/> Avg. Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxDeaths"/> Max Deaths
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageDeaths"/> Avg. Deaths
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxAssists"/> Max Assists
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageAssists"/> Avg. Assists
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageKDA"/> Avg. KDA
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxKillingSpree"/> Max Killing Spree
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxCriticalStrike"/> Max Critical
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageMaxCriticalStrike"/> Avg. Max Critical
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxHeal"/> Max Heal
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageHeal"/> Avg. Heal
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxUnitsHealed"/> Max Units Healed
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageUnitsHealed"/> Avg. Units Healed
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxTowerKills"/> Max Tower Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageTowerKills"/> Avg. Tower Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="maxInhibitorKills"/> Max Inhib Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="averageInhibitorKills"/> Avg. Inhib Kills
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="matchs" checked="checked"/> Matchs
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="bans" checked="checked"/> Bans
			</label>
		</div>
	</div>
	<div class="col-md-2 col-xs-4">
		<div class="checkbox">
			<label>
				<input type="checkbox" data-target="winrate"/> Winrate
			</label>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 table-responsive">
		<table style="width: 100%; border-collapse:collapse;" class="table tablesorter" id="statistics">
			<thead>
				<tr>
					<th class="champion">Champion</th>
					<th class="maxDamageDealt">Max Damage Dealt</th>
					<th class="averageTotalDamageDealt">Average Total Damage Dealt</th>
					<th class="maxDamageTaken">Max Damage Taken</th>
					<th class="averageTotalDamageTaken">Average Total Damage Taken</th>
					<th class="maxKills">Max Kills</th>
					<th class="averageKills">Average Kills</th>
					<th class="maxDeaths">Max Deaths</th>
					<th class="averageDeaths">Average Deaths</th>
					<th class="maxAssists">Max Assists</th>
					<th class="averageAssists">Average Assists</th>
					<th class="averageKDA">Average KDA</th>
					<th class="maxKillingSpree">Max Killing Spree</th>
					<th class="maxCriticalStrike">Max Critical Strike</th>
					<th class="averageMaxCriticalStrike">Average Max Critical Strike</th>
					<th class="maxHeal">Max Heal</th>
					<th class="averageHeal">Average Heal</th>
					<th class="maxUnitsHealed">Max Units Healed</th>
					<th class="averageUnitsHealed">Average Units Healed</th>
					<th class="maxTowerKills">Max Tower Kills</th>
					<th class="averageTowerKills">Average Tower Kills</th>
					<th class="maxInhibitorKills">Max Inhibitor Kills</th>
					<th class="averageInhibitorKills">Average Inhibitor Kills</th>
					<th class="matchs">Matchs</th>
					<th class="bans">Bans</th>
					<th class="winrate">Winrate</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($champions_data as $id => $champion)
				{
					$champInfo							 = $champions_info->$id;
					$averageCumulatedKills				 = round($champion->cumulatedKills / $champion->played);
					$averageCumulatedAssists			 = round($champion->cumulatedAssists / $champion->played);
					$averageCumulatedDeaths				 = round($champion->cumulatedDeaths / $champion->played);
					$averageMaxCriticalStrike			 = round($champion->cumulatedMaxCriticalStrike / $champion->played);
					$averageKDA							 = round(($averageCumulatedKills + $averageCumulatedAssists) / $averageCumulatedDeaths, 2);
					$averageTotalDamageTaken			 = round($champion->cumulatedTotalDamageTaken / $champion->played);
					$averageTotalDamageDealtToChampions	 = round($champion->cumulatedTotalDamageDealtToChampions / $champion->played);
					$averageCumulatedTotalHeal			 = round($champion->cumulatedTotalHeal / $champion->played);
					$averageCumulatedUnitsHealed		 = round($champion->cumulatedUnitsHealed / $champion->played);
					$averageCumulatedTowerKills			 = round($champion->cumulatedTowerKills / $champion->played, 2);
					$averageCumulatedInhibitorKills		 = round($champion->cumulatedInhibitorKills / $champion->played, 2);
					$totalBans							 = $champion->banAtSixthTurn + $champion->banAtFifthTurn + $champion->banAtFourthTurn + $champion->banAtThirdTurn + $champion->banAtSecondTurn + $champion->banAtFirstTurn;
					$winrate							 = round($champion->wins / $champion->played * 100, 2);
					?>
					<tr>
						<td class="champion">
							<a href="/champions/<?php echo $champInfo->name ?>" class="champions">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $champInfo->key ?>.png" class="avatar" alt="<?php echo $champInfo->name ?>"/>
								<br/>
								<?php echo $champInfo->name ?>
							</a>
						</td>
						<td class="maxDamageDealt">
							<?php echo $champion->maxTotalDamageDealtToChampions ?>
							<br/>
							<progress value="<?php echo $champion->maxTotalDamageDealtToChampions ?>" 
									  max="<?php echo $stats->maxValues['maxTotalDamageDealtToChampions'] ?>"></progress>
						</td>
						<td class="averageTotalDamageDealt">
							<?php echo $averageTotalDamageDealtToChampions; ?>
							<br/>
							<progress value="<?php echo $averageTotalDamageDealtToChampions; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedTotalDamageDealtToChampions'] ?>"></progress>
						</td>
						<td class="maxDamageTaken">
							<?php echo $champion->maxTotalDamageTaken ?>
							<br/>
							<progress value="<?php echo $champion->maxTotalDamageTaken ?>" 
									  max="<?php echo $stats->maxValues['maxTotalDamageTaken'] ?>"></progress>
						</td>
						<td class="averageTotalDamageTaken">
							<?php echo $averageTotalDamageTaken; ?>
							<br/>
							<progress value="<?php echo $averageTotalDamageTaken; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedTotalDamageTaken'] ?>"></progress>
						</td>
						<td class="maxKills">
							<?php echo $champion->maxKills ?>
							<br/>
							<progress value="<?php echo $champion->maxKills ?>" 
									  max="<?php echo $stats->maxValues['maxKills'] ?>"></progress>
						</td>
						<td class="averageKills">
							<?php echo $averageCumulatedKills; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedKills; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedKills'] ?>"></progress>
						</td>
						<td class="maxDeaths">
							<?php echo $champion->maxDeaths ?>
							<br/>
							<progress value="<?php echo $champion->maxDeaths ?>" 
									  max="<?php echo $stats->maxValues['maxDeaths'] ?>"></progress>
						</td>
						<td class="averageDeaths">
							<?php echo $averageCumulatedDeaths; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedDeaths; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedDeaths'] ?>"></progress>
						</td>
						<td class="maxAssists">
							<?php echo $champion->maxAssists ?>
							<br/>
							<progress value="<?php echo $champion->maxAssists ?>" 
									  max="<?php echo $stats->maxValues['maxAssists'] ?>"></progress>
						</td>
						<td class="averageAssists">
							<?php echo $averageCumulatedAssists; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedAssists; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedAssists'] ?>"></progress>
						</td>
						<td class="averageKDA">
							<?php echo $averageKDA; ?>
							<br/>
							<progress value="<?php echo $averageKDA; ?>" 
									  max="<?php echo $stats->maxValues['averageKDA'] ?>"></progress>
						</td>
						<td class="maxKillingSpree">
							<?php echo $champion->maxKillingSpree ?>
							<br/>
							<progress value="<?php echo $champion->maxKillingSpree ?>" 
									  max="<?php echo $stats->maxValues['maxKillingSpree'] ?>"></progress>
						</td>
						<td class="maxCriticalStrike">
							<?php echo $champion->maxCriticalStrike ?>
							<br/>
							<progress value="<?php echo $champion->maxCriticalStrike ?>" 
									  max="<?php echo $stats->maxValues['maxCriticalStrike'] ?>"></progress>
						</td>
						<td class="averageMaxCriticalStrike">
							<?php echo $averageMaxCriticalStrike; ?>
							<br/>
							<progress value="<?php echo $averageMaxCriticalStrike; ?>" 
									  max="<?php echo $stats->maxValues['averageMaxCriticalStrike'] ?>"></progress>
						</td>
						<td class="maxHeal">
							<?php echo $champion->maxTotalHeal ?>
							<br/>
							<progress value="<?php echo $champion->maxTotalHeal ?>" 
									  max="<?php echo $stats->maxValues['maxTotalHeal'] ?>"></progress>
						</td>
						<td class="averageHeal">
							<?php echo $averageCumulatedTotalHeal; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedTotalHeal; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedTotalHeal'] ?>"></progress>
						</td>
						<td class="maxUnitsHealed">
							<?php echo $champion->maxUnitsHealed ?>
							<br/>
							<progress value="<?php echo $champion->maxUnitsHealed ?>" 
									  max="<?php echo $stats->maxValues['maxUnitsHealed'] ?>"></progress>
						</td>
						<td class="averageUnitsHealed">
							<?php echo $averageCumulatedUnitsHealed; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedUnitsHealed; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedUnitsHealed'] ?>"></progress>
						</td>
						<td class="maxTowerKills">
							<?php echo $champion->maxTowerKills ?>
							<br/>
							<progress value="<?php echo $champion->maxTowerKills ?>" 
									  max="<?php echo $stats->maxValues['maxTowerKills'] ?>"></progress>
						</td>
						<td class="averageTowerKills">
							<?php echo $averageCumulatedTowerKills; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedTowerKills; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedTowerKills'] ?>"></progress>
						</td>
						<td class="maxInhibitorKills">
							<?php echo $champion->maxInhibitorKills ?>
							<br/>
							<progress value="<?php echo $champion->maxInhibitorKills ?>" 
									  max="<?php echo $stats->maxValues['maxInhibitorKills'] ?>"></progress>
						</td>
						<td class="averageInhibitorKills">
							<?php echo $averageCumulatedInhibitorKills; ?>
							<br/>
							<progress value="<?php echo $averageCumulatedInhibitorKills; ?>" 
									  max="<?php echo $stats->maxValues['averageCumulatedInhibitorKills'] ?>"></progress>
						</td>
						<td class="matchs">
							<?php echo $champion->played ?>
							<br/>
							<progress value="<?php echo $champion->played ?>" 
									  max="<?php echo $stats->maxValues['played'] ?>"></progress>
						</td>
						<td class="bans">
							<?php echo $totalBans; ?>
							<br/>
							<progress value="<?php echo $totalBans ?>" 
									  max="<?php echo $stats->maxValues['totalBans'] ?>"></progress>
						</td>
						<td class="winrate">
							<?php echo $winrate; ?>%
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php
require_once('../layouts/footer.php');
?>
<?php
if (empty($_GET['name']))
	die('NURF');

require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/champions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/debug.php';

$id = 0;
foreach ($champions_info as $key => $value)
{
	if ($value->name == $_GET['name'])
		$id = $key;
}

if ($id == 0)
	die('NURF');


require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/bans.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/spells.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/items.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/lanes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/roles.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/ranking.php';


$spells		 = array();
$spellsTotal = 0;
foreach ($champions_spells->$id as $key => $value)
{
	$spells[$key] = $value;
	$spellsTotal += $value;
}
arsort($spells);

$items		 = array();
$itemsTotal	 = 0;
foreach ($champions_items->$id as $key => $value)
{
	if (!empty($items_info->$key))
	{
		if ($items_info->$key->boots > 0)
		{
			if (empty($items['Boots']))
				$items['Boots']			 = array();
			$items['Boots'][$key]	 = $value;
		}
		elseif ($items_info->$key->trinket > 0)
		{
			if (empty($items['Trinkets']))
				$items['Trinkets']		 = array();
			$items['Trinkets'][$key] = $value;
		}
		elseif ($items_info->$key->consumable > 0)
		{
			if (empty($items['Consumables']))
				$items['Consumables']		 = array();
			$items['Consumables'][$key]	 = $value;
		}
		else
		{
			if (empty($items[$items_info->$key->depth]))
				$items[$items_info->$key->depth]		 = array();
			$items[$items_info->$key->depth][$key]	 = $value;
		}
	}
}
krsort($items);
foreach ($items as &$item)
	arsort($item);

$html_title = $champions_info->$id->name;
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/header.php';
?>
<script type="text/javascript">
	$(function () {
		$("#rankingChart").drawDoughnutChart([
			{title: "Unranked", value: <?php echo $champions_ranking->$id->unranked ?>, color: "#898FF0"},
			{title: "Bronze", value: <?php echo $champions_ranking->$id->bronze ?>, color: "#7D6951"},
			{title: "Silver", value: <?php echo $champions_ranking->$id->silver ?>, color: "#bdbdbd"},
			{title: "Gold", value: <?php echo $champions_ranking->$id->gold ?>, color: "#EBDD54"},
			{title: "Platinum", value: <?php echo $champions_ranking->$id->platinum ?>, color: "#356562"},
			{title: "Diamond", value: <?php echo $champions_ranking->$id->diamond ?>, color: "#32a6d6"},
			{title: "Master", value: <?php echo $champions_ranking->$id->master ?>, color: "#D7DADB"},
			{title: "Challenger", value: <?php echo $champions_ranking->$id->challenger ?>, color: "#c0edeb"}
		]);
	});
</script>

<div class="row profile">
	<div  class="col-md-4 center">
		<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $champions_info->$id->key; ?>.png" alt="<?php echo $champions_info->$id->name; ?>"/>
	</div>
	<div class="col-md-8 center">
		<h1><?php echo $champions_info->$id->name ?></h1>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div id="rankingChart"  class="chart"></div>
		<hr/>
		<div>
			<h3 class="center">Spells</h3>
		</div>
		<div class="row">
			<div class="col-xs-12" id="spells">
				<?php
				foreach ($spells as $key => $value)
				{
					?>
					<div class="spell">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/spell/<?php echo($spells_info->$key->key) ?>.png" alt="<?php echo $spells_info->$key->name; ?>" title="<?php echo $spells_info->$key->name . ' - ' . $value; ?> times"/>
						<span class="spellPercentage"><?php echo round($value / ($spellsTotal / 2) * 100, 2); ?>%</span>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<hr/>
		<div>
			<h3 class="center">Items</h3>
		</div>
		<div class="row">
			<?php
			foreach ($items as $depth => $itemGroup)
			{
				?>
				<div class="col-xs-12 center expandItems" data-target="items<?php echo $depth ?>"><?php echo is_numeric($depth) ? 'Items Tier ' . $depth : $depth ?></div>
				<div class="col-xs-12 items" id="items<?php echo $depth ?>">
					<?php
					foreach ($itemGroup as $key => $value)
					{
						?>
						<div class="item">
							<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/item/<?php echo($items_info->$key->key) ?>.png" alt="<?php echo $items_info->$key->name; ?>" title="<?php echo $items_info->$key->name . ' - ' . $value; ?> times"/>
							<span class="itemPercentage"><?php echo round($value / ($spellsTotal / 2) * 100, 2); ?>%</span>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<div class="col-md-8 profileStatistics">
		<div class="row">
			<div class="col-xs-8">Popularity</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->played / $matchs_data->played * 100, 1) ?>%</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Winrate</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->wins / $champions_data->$id->played * 100, 2); ?>%</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Banned</div>
			<div class="col-xs-4 right"><?php echo round($bans[$id] / $matchs_data->played * 100, 1); ?>%</div>
		</div>

		<h2 class="center">Lanes</h2>
		
		<div class="row">
			<div class="col-xs-8">Top</div>
			<div class="col-xs-4 right"><?php echo round($lanes_data->$id->top / $lanes_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Jungle</div>
			<div class="col-xs-4 right"><?php echo round($lanes_data->$id->jungle / $lanes_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Mid</div>
			<div class="col-xs-4 right"><?php echo round($lanes_data->$id->mid / $lanes_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Bot</div>
			<div class="col-xs-4 right"><?php echo round($lanes_data->$id->bottom / $lanes_data->$id->total * 100, 1) ?>%</div>
		</div>

		<h2 class="center">Roles</h2>
		
		<div class="row">
			<div class="col-xs-8">Duo Support</div>
			<div class="col-xs-4 right"><?php echo round($roles_data->$id->duoSupport / $roles_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Duo Carry</div>
			<div class="col-xs-4 right"><?php echo round($roles_data->$id->duoCarry / $roles_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Duo</div>
			<div class="col-xs-4 right"><?php echo round($roles_data->$id->duo / $roles_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">Solo</div>
			<div class="col-xs-4 right"><?php echo round($roles_data->$id->solo / $roles_data->$id->total * 100, 1) ?>%</div>
		</div>
		
		<div class="row">
			<div class="col-xs-8">None</div>
			<div class="col-xs-4 right"><?php echo round($roles_data->$id->none / $roles_data->$id->total * 100, 1) ?>%</div>
		</div>

		<h2 class="center">Average statistics</h2>


		<div class="row">
			<div class="col-xs-8">KDA</div>
			<div class="col-xs-4 right">
				<?php echo round($champions_data->$id->cumulatedKills / $champions_data->$id->played, 1); ?> /
				<?php echo round($champions_data->$id->cumulatedDeaths / $champions_data->$id->played, 1); ?> /
				<?php echo round($champions_data->$id->cumulatedAssists / $champions_data->$id->played, 1); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Level reached</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedMaxLevel / $champions_data->$id->played); ?></div>
		</div>

		<h4 class="center">Offence</h4>

		<div class="row">
			<div class="col-xs-8">First blood</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedFirstBloodKill / $champions_data->$id->played * 100, 1); ?>%</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Damage dealt to champions</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTotalDamageDealtToChampions / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Magic damage dealt to champions</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedMagicDamageDealtToChampions / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Physical damages dealt to champions</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedPhysicalDamageDealtToChampions / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">True damage dealt to champions</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTrueDamageDealtToChampions / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max critical strike</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedMaxCriticalStrike / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Pentakills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedPentaKills / $champions_data->$id->played, 4); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Quadrakills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedQuadraKills / $champions_data->$id->played, 4); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Triplekills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTripleKills / $champions_data->$id->played, 2); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Doublekills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedDoubleKills / $champions_data->$id->played, 2); ?></div>
		</div>

		<h4 class="center">Defence</h4>

		<div class="row">
			<div class="col-xs-8">Damage taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTotalDamageTaken / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Magic damage taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedMagicDamageTaken / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Physical damage taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedPhysicalDamageTaken / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">True damage taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTrueDamageTaken / $champions_data->$id->played); ?></div>
		</div>

		<h4 class="center">Utility</h4>

		<div class="row">
			<div class="col-xs-8">Crowd Control Dealt</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTimeCrowdControlDealt / $champions_data->$id->played); ?>s</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Total Heal</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTotalHeal / $champions_data->$id->played); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Inhibitor Kills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedInhibitorKills / $champions_data->$id->played, 2); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Tower Kills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedTowerKills / $champions_data->$id->played, 2); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Vision Wards Bought</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedVisionWardsBought / $champions_data->$id->played, 2); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Sight Wards Bought</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->cumulatedSightWardsBought / $champions_data->$id->played, 2); ?></div>
		</div>

		<h2 class="center">Performances</h2>

		<div class="row">
			<div class="col-xs-8">Max Kills</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxKills; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Deaths</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxDeaths; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Assists</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxAssists; ?></div>
		</div>

		<h4 class="center">Offence</h4>

		<div class="row">
			<div class="col-xs-8">Max Damage Dealt</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxTotalDamageDealtToChampions); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Magic Damage Dealt</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxMagicDamageDealtToChampions); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Physical Damage Dealt</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxPhysicalDamageDealtToChampions); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max True Damage Dealt</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxTrueDamageDealtToChampions); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Critical Strike</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxCriticalStrike); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Killing Spree</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxKillingSpree); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Multi Kill</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxMultiKill); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Unreal Kills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxUnrealKills); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Pentakills</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxPentaKills); ?></div>
		</div>

		<h4 class="center">Defence</h4>

		<div class="row">
			<div class="col-xs-8">Max Damage Taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxTotalDamageTaken); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max True Damage Taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxTrueDamageTaken); ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Physical Damage Taken</div>
			<div class="col-xs-4 right"><?php echo round($champions_data->$id->maxPhysicalDamageTaken); ?></div>
		</div>

		<h4 class="center">Utility</h4>

		<div class="row">
			<div class="col-xs-8">Max Heal</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxTotalHeal; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Crowd Control Dealt</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxTimeCrowdControlDealt; ?>s</div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Inhibitor Kills</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxInhibitorKills; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Tower Kills</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxTowerKills; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Vision Wards Bought</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxVisionWardsBought; ?></div>
		</div>

		<div class="row">
			<div class="col-xs-8">Max Sight Wards Bought</div>
			<div class="col-xs-4 right"><?php echo $champions_data->$id->maxSightWardsBought; ?></div>
		</div>
	</div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/footer.php';
?>
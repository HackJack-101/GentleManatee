<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/awards.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GentleManatee - The 2015 URF Awards</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

		<link href="/favicon.png" type="image/png" rel="icon" />
		<link href="/favicon.png" type="image/png" rel="shortcut icon" />
		<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link href='http://fonts.googleapis.com/css?family=Limelight' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Megrim' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/style/awards.css"/>

		<meta name="description" content="URF URF URF"/>
        <meta name="keywords" content="URF, Manatee, Gentleman"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<meta property="og:locale" content="en_US"/>
        <meta property="og:image" content="http://challenge.hackjack.info/favicon.png"/>

		<script type="text/javascript" src="/scripts/music.js"></script>
	</head> 

	<body> 
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/menu.php'; ?>
		<audio id="introMusic" loop>
			<source src="/sounds/LoginScreenIntro.mp3" type="audio/mpeg">
			<source src="/sounds/LoginScreenIntro.ogg" type="audio/ogg">
			Votre navigateur ne supporte pas l'élément <code>audio</code>.
		</audio>
		<button onclick="mute();" id="muteMusic"><span class="glyphicon glyphicon-volume-off" aria-hidden="true"></span></button>

		<div id="slide1">
			<div class="content container">
				<div id="intro">
					<img class="img-responsive" src="/images/gentlemanatee.png"/>
				</div>
				<h3 class="limelight" id="presents">presents</h3>
			</div> 
		</div> 

		<div class="slideDiviser" id="slide2">
			<div class="content container" >
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The 2015 URF AWARDS</h2>
						<h2 class="limelight center">The BEST Category</h2>
					</div>
				</div>
			</div> 
		</div> 

		<div class="slide" id="slide3">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $winner->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $winner->key ?>.png" alt="<?php echo $winner->name ?>"/>
								<?php echo $winner->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Winner Award</span> for best winrate in URF
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $famous->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $famous->key ?>.png" alt="<?php echo $famous->name ?>"/>
								<?php echo $famous->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Famous Award</span> for most picked in URF
							<div class="quote">People love me</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $banned->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $banned->key ?>.png" alt="<?php echo $banned->name ?>"/>
								<?php echo $banned->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Unwelcome Award</span> for most banned in URF
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $bestDealer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $bestDealer->key ?>.png" alt="<?php echo $bestDealer->name ?>"/>
								<?php echo $bestDealer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Press R Award</span> for highest damage dealt in one URF game
							<div class="quote">Only <?php echo round(array_values($bestDPS)[0] / 1000); ?>k…</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $richGuy->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $richGuy->key ?>.png" alt="<?php echo $richGuy->name ?>"/>
								<?php echo $richGuy->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Rich Guy Award</span> for highest gold earned in one UFR game
							<div class="quote">Can I desposit <?php echo round(array_values($highestGold)[0] / 1000); ?>k gold?</div>
						</div>
					</div>
				</div>				

			</div> 
		</div> 


		<div class="slideDiviser" id="slide4">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="worst" class="limelight center categoryAwards">The WORST Category</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide5">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $loser->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $loser->key ?>.png" alt="<?php echo $loser->name ?>"/>
								<?php echo $loser->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Loser Award</span> for worst winrate in URF
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $forgotten->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $forgotten->key ?>.png" alt="<?php echo $forgotten->name ?>"/>
								<?php echo $forgotten->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Forgotten Award</span> for least picked in URF
							<div class="quote">Come play with me, please…</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $worstDealer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $worstDealer->key ?>.png" alt="<?php echo $worstDealer->name ?>"/>
								<?php echo $worstDealer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Not Hurting a Fly Award</span> for lowest damage dealt per game in URF
							<div class="quote">But… I killed one minion!</div>

						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $deadBody->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $deadBody->key ?>.png" alt="<?php echo $deadBody->name ?>"/>
								<?php echo $deadBody->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Teemo Award</span> for highest number of deaths in one URF game
							<div class="quote"><?php echo array_values($maxDeaths)[0] ?> souls for Thresh and counting…</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $markedMan->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $markedMan->key ?>.png" alt="<?php echo $markedMan->name ?>"/>
								<?php echo $markedMan->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Marked Yordle Award</span> for highest number of deaths per game in URF
							<div class="quote">Stop focusing me!</div>
						</div>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slideDiviser" id="slide6">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="bulldozer" class="limelight center categoryAwards">The BULLDOZER Category</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide7">
			<div class="content container">

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $bestTank->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $bestTank->key ?>.png" alt="<?php echo $bestTank->name ?>"/>
								<?php echo $bestTank->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Tank Award</span> for highest damage taken in one URF game
							<div class="quote">It tickles!</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $inhibMan->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $inhibMan->key ?>.png" alt="<?php echo $inhibMan->name ?>"/>
								<?php echo $inhibMan->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Hulk Award</span> for highest inhibitor destroyed during one game in URF
							<div class="quote"><?php echo array_values($inhib)[0] ?> is enough</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $selfHealer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $selfHealer->key ?>.png" alt="<?php echo $selfHealer->name ?>"/>
								<?php echo $selfHealer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Immortal Award</span> for highest self heal per game in URF
							<div class="quote">I can't help myself</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $killer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $killer->key ?>.png" alt="<?php echo $killer->name ?>"/>
								<?php echo $killer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Highlander Award</span> for highest killing spree in one URF game
							<div class="quote">It's easier than farming minions.</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $farmer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $farmer->key ?>.png" alt="<?php echo $farmer->name ?>"/>
								<?php echo $farmer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Farmer Award</span> for highest minions count in one URF game
							<div class="quote">Is <?php echo array_values($minions)[0] ?> creeps killed a genocide?</div>
						</div>
					</div>
				</div>
			</div> 
		</div>


		<div class="slideDiviser" id="slide8">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="support" class="limelight center categoryAwards">The SUPPORT Category</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide9">
			<div class="content container">

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $healer->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $healer->key ?>.png" alt="<?php echo $healer->name ?>"/>
								<?php echo $healer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Red Cross Award</span> for highest heal dealt per game in URF
							<div class="quote"><a href="https://youtu.be/9i3KQeieQG0" target="_blank">Call 911! Didou didou didou!</a></div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $goodGuy->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $goodGuy->key ?>.png" alt="<?php echo $goodGuy->name ?>"/>
								<?php echo $goodGuy->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Good Guy Award</span> for most assists in one URF game
							<div class="quote">I missed <?php echo array_values($maxAssists)[0] ?> kills…</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $ward->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $ward->key ?>.png" alt="<?php echo $ward->name ?>"/>
								<?php echo $ward->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Big Brother Award</span> for biggest amount of bought wards per game in URF
							<div class="quote">I'm watching you</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $poorGuy->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $poorGuy->key ?>.png" alt="<?php echo $poorGuy->name ?>"/>
								<?php echo $poorGuy->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Poor Guy Award</span> for lowest gold earned per game in URF
							<div class="quote">I'm a support…</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="/champions/<?php echo $ccGuy->name ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $ccGuy->key ?>.png" alt="<?php echo $ccGuy->name ?>"/>
								<?php echo $ccGuy->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Annoying Award</span> for highest time crowd control dealt in one URF game
							<div class="quote">Take it slow…</div>
						</div>
					</div>
				</div>

			</div> 
		</div> 

		<div class="slideDiviser" id="slide10">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="useless" class="limelight center categoryAwards">The USELESS Category</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide11">
			<div class="content container">
				<div class="row reward">

					<div class="col-md-12 award">
						<div class="portrait">
							<a href="#useless" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/item/3158.png" alt="Ionian Boots of Lucidity"/>
								Ionian Boots of Lucidity
							</a>
						</div>
						<div class="description">
							<span class="awardName">Boots of Uselessness Award</span> for being bought <?php echo $lucidityBought ?> times in <?php echo $teams_data->red->wins + $teams_data->blue->wins; ?> URF games
							<div class="quote">Cooldown Reduction, OVER 9000!</div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="#useless" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/spell/SummonerMana.png" alt="Clarity"/>
								Clarity
							</a>
						</div>
						<div class="description">
							<span class="awardName">Useless Spell Award</span> for being taken <?php echo $clarityTaken ?> times in <?php echo $teams_data->red->wins + $teams_data->blue->wins; ?> URF games
							<div class="quote"><a href="https://youtu.be/8N_tupPBtWQ" target="_blank">Mana Mana!</a></div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="#useless" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/item/2004.png" alt="Mana Potion"/>
								Mana Potion
							</a>
						</div>
						<div class="description">
							<span class="awardName">Useless Potion Award</span> for being bought <?php echo $manaPotionBought ?> times in <?php echo $teams_data->red->wins + $teams_data->blue->wins; ?> URF games
							<div class="quote"><a href="https://youtu.be/8N_tupPBtWQ" target="_blank">Mana Mana! (bis)</a></div>
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 award">
						<div class="portrait">
							<a href="#useless" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/item/3070.png" alt="Tear of the Goddess"/>
								Tear of the Goddess
							</a>
						</div>
						<div class="description">
							<span class="awardName"> Award of Unfinishedness</span> <?php echo $tearBought ?> times in <?php echo $teams_data->red->wins + $teams_data->blue->wins; ?> URF games
							<div class="quote">Cry me a river</div>
						</div>
					</div>
				</div>
			</div> 
		</div> 

		<div class="slideDiviser" id="slide12">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="thanks" class="limelight center categoryAwards">Special Thanks</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide13">
			<div class="content container">

				<div class="row reward">
					<div class="col-md-12 thanks">
						<div id="donation"><?php echo number_format($totalGoldEarned - $totalGoldSpent) ?> gold</div>
						Thanks to all of you, summoners! The gold you didn't spend will be used as a donation for a greatful association.<br/>
						Let's me introduce you, the SWAG: "Stop Warwick from Attacking Gentlemanatees".<br/>
						The aim of this asssociation is to protect manatees, in particular, the progeny of <b>Urf The First</b> (<i>1st April 2010 - 1st April 2010</i>).
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12 thanks">
						Thanks to Riot Games! This year URF mode was more balanced and we really appreciated the health cost reduction.<br/>
						And, of course thank you for this challenge ;-)
					</div>
				</div>

			</div> 
		</div> 

		<footer style="text-align: center; font-style: italic">
			Sources are hosted on Github : <a href="https://github.com/AamuLumi/GentleManateeAPI" target="_blank">API server</a> and <a href="https://github.com/Jack3113/GentleManatee" target="_blank">web server</a><br/>
			Developed by <a href="https://twitter.com/AamuLumi" target="_blank">Aamu Lumi</a> and <a href="https://twitter.com/J_ck3113" target="_blank">Hackjack</a><br/>
			This product is not endorsed, certified or otherwise approved in any way by Riot Games, Inc. or any of its affiliates.<br/>
			© 2015 Riot Games, Inc. All rights reserved. Riot Games, League of Legends and PvP.net are trademarks, services marks, or registered trademarks of Riot Games, Inc.
		</footer>

	</body>
</html>

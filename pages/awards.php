<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/analysis/globalstats.php';

/* * ************* Reset  ************** */
reset($winners);
reset($losers);
reset($mostPicks);
reset($mostBans);
reset($bestDPS);
reset($worstDPS);

/* * ************* Get the first key  ************** */
$winnerKey		 = key($winners);
$loserKey		 = key($losers);
$famousKey		 = key($mostPicks);
$bannedKey		 = key($mostBans);
$bestDealerKey	 = key($bestDPS);
$worstDealerKey	 = key($worstDPS);

/* * ************* Extract the data  ************** */
$winner		 = $champions_info->$winnerKey;
$loser		 = $champions_info->$loserKey;
$famous		 = $champions_info->$famousKey;
$banned		 = $champions_info->$bannedKey;
$bestDealer	 = $champions_info->$bestDealerKey;
$worstDealer = $champions_info->$worstDealerKey;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GentleManatee - The 2015 URF Awards</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

		<link href="/favicon.png" type="image/png" rel="icon" />
		<link href="/favicon.png" type="image/png" rel="shortcut icon" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="/style/parallax.css"/>
		<link href='http://fonts.googleapis.com/css?family=Limelight' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

		<meta name="description" content="URF URF URF"/>
        <meta name="keywords" content="URF, Manatee, Gentleman"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<meta property="og:locale" content="en_US"/>
        <meta property="og:image" content="http://challenge.hackjack.info/favicon.png"/>

		<script type="text/javascript" src="/scripts/music.js"></script>
	</head> 

	<body> 
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/menu.php'; ?>
		<audio src="/sounds/LoginScreenIntro.mp3" id="introMusic" loop>
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
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $winner->key ?>" class="name">
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
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $famous->key ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $famous->key ?>.png" alt="<?php echo $famous->name ?>"/>
								<?php echo $famous->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Famous Award</span> for most picked in URF
						</div>
					</div>
				</div>

				<div class="row reward">
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $banned->key ?>" class="name">
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
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $bestDealer->key ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $bestDealer->key ?>.png" alt="<?php echo $bestDealer->name ?>"/>
								<?php echo $bestDealer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Press R Award</span> for highest damage dealt by match in URF
						</div>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slideDiviser" id="slide4">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The WORST Category</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide5">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $loser->key ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $loser->key ?>.png" alt="<?php echo $loser->name ?>"/>
								<?php echo $loser->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Loser Award</span> for least winrate in URF
						</div>
					</div>
				</div>
				
				<div class="row reward">
					<div class="col-md-12">
						<div class="portrait">
							<a href="/champions/<?php echo $loser->key ?>" class="name">
								<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/<?php echo $worstDealer->key ?>.png" alt="<?php echo $worstDealer->name ?>"/>
								<?php echo $worstDealer->name ?>
							</a>
						</div>
						<div class="description">
							<span class="awardName">Not Hurting a Fly Award</span> for lowest damage dealt by match in URF
						</div>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slideDiviser" id="slide6">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The 2015 URF AWARDS</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide7">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/Hecarim.png" alt="Hecarim"/>
						<span class="description">
							<a href="/champions/Hecarim">Hecarim</a> as The Bulldozer#1
						</span>
					</div>
					<div class="col-md-12">
						<h4 class="center">Ex-&aelig;quo</h4>
					</div>
					<div class="col-md-12">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/Karma.png" alt="Karma"/>
						<span class="description">
							<a href="/champions/Karma">Karma</a> as The Bulldozer#2
						</span>
					</div>
				</div>
			</div> 
		</div>


		<div class="slideDiviser" id="slide8">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The 2015 URF AWARDS</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide9">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/Hecarim.png" alt="Hecarim"/>
						<span class="description">
							<a href="/champions/Hecarim">Hecarim</a> as The Example
						</span>
					</div>
				</div>
			</div> 
		</div> 

		<div class="slideDiviser" id="slide10">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The 2015 URF AWARDS</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide11">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/Hecarim.png" alt="Hecarim"/>
						<span class="description">
							<a href="/champions/Hecarim">Hecarim</a> as The Example
						</span>
					</div>
				</div>
			</div> 
		</div> 

		<div class="slideDiviser" id="slide12">
			<div class="content container">
				<div class="row">
					<div class="col-md-12">
						<h2 id="awards" class="limelight center">The 2015 URF AWARDS</h2>
					</div>
				</div>
			</div> 
		</div> 


		<div class="slide" id="slide13">
			<div class="content container">
				<div class="row reward">
					<div class="col-md-12">
						<img src="http://ddragon.leagueoflegends.com/cdn/5.6.1/img/champion/Hecarim.png" alt="Hecarim"/>
						<span class="description">
							<a href="/champions/Hecarim">Hecarim</a> as The Example
						</span>
					</div>
				</div>
			</div> 
		</div> 

		<footer style="text-align: center; font-style: italic; color: white; padding: 1em 0;">
			This product is not endorsed, certified or otherwise approved in any way by Riot Games, Inc. or any of its affiliates.<br/>
			© 2015 Riot Games, Inc. All rights reserved. Riot Games, League of Legends and PvP.net are trademarks, services marks, or registered trademarks of Riot Games, Inc.
		</footer>

	</body>
</html>

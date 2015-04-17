<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/debug.php';

switch ($_GET['code'])
{
	case '500':
		header("HTTP/1.0 500 Internal Server Error");
		$html_title	 = '500 NURF';
		$title		 = '500';
		$subtitle	 = 'Internal Server Error';
		$message	 = 'Warwick destroyed the server (again...)';
		break;
	case '403':
		header("HTTP/1.0 403 Forbidden");
		$html_title	 = '403 NURF';
		$title		 = '403';
		$subtitle	 = 'Forbidden';
		$message	 = 'Be careful, you are in Warwick\'s jungle...';
		break;
	case '404':
	default:
		header("HTTP/1.0 404 Not Found");
		$html_title	 = '404 NURF';
		$title		 = '404';
		$subtitle	 = 'Page Not Found';
		$message	 = 'Warwick ate "' . $_SERVER['REQUEST_URI'] . '" page (again...)';
		break;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GentleManatee - <?php echo $html_title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	

		<link href="/favicon.png" type="image/png" rel="icon" />
		<link href="/favicon.png" type="image/png" rel="shortcut icon" />
		<link rel="apple-touch-icon" href="/images/apple-touch-icon.png" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" href="/style/error.css"/>

		<meta name="description" content="URF URF URF"/>
        <meta name="keywords" content="URF, Manatee, Gentleman"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<meta property="og:locale" content="en_US"/>
        <meta property="og:image" content="http://challenge.hackjack.info/favicon.png"/>
	</head> 

	<body> 
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layouts/menu.php'; ?>
		<div id="main">
			<div class="error">
				<h1><?php echo $title; ?></h1>
				<h2><?php echo $subtitle; ?></h2>
				<p><?php echo $message; ?></p>
			</div>
		</div>
	</body>
</html>
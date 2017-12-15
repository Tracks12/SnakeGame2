<!DOCTYPE html>
<!-- Snake Game v2 -->
<!-- index.php -->
<html>
	<?php
		$host = ''; // hôte de la base de donnée
		$dbName = ''; // nom de la base de donnée
		$encoding = ''; // encodage à utiliser
		$username = ''; // utilisateur de connexion
		$password = ''; // mot de passe utilisateur
		
		try { $bdd = new PDO("mysql:host=$host;dbname=$dbName;charset=$encoding", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); }
		catch(Exception $e) { die('ERROR: '.$e->getMessage()); }
		
		$data = $bdd->query("SELECT * FROM snake ORDER BY score DESC");
		$player = array(); $score = array();
		for($i = 0; $i < 10; $i++) {
			$output = $data->fetch(PDO::FETCH_NUM);
			$player[$i] = $output[0];
			$score[$i] = $output[1];
		}
	?>
	<head>
		<meta charset="UTF-8">
		<title>Snake Game v2</title>
		<link rel="stylesheet" type="text/css" href="./snake.css" />
		<script language="javascript" type="text/javascript" src="./snakeGame.js"></script>
	</head>
	<body>
		<audio id="sound" style="height: 0; width: 0;">
			<source type="audio/mpeg" src="./snake.mp3" />
		</audio>
	</body>
	<script>
		document.getElementById('sound').volume = 0.70;
		var leaderboard = {
			'player': [<?php echo("'$player[0]', '$player[1]', '$player[2]', '$player[3]', '$player[4]', '$player[5]', '$player[6]', '$player[7]', '$player[8]', '$player[9]'"); ?>],
			'score': [<?php echo("$score[0], $score[1], $score[2], $score[3], $score[4], $score[5], $score[6], $score[7], $score[8], $score[9]"); ?>]
		};
	</script>
</html>
<!-- END -->

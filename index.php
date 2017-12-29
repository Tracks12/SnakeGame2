<!DOCTYPE html>
<!-- Snake Game v2 -->
<!-- index.php -->
<html>
	<?php
		class dataBase {
			public static function disconnect() { return self::$bdd = NULL; }
			public static function connect() {
				try { self::$bdd = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=".self::$encoding, self::$username, self::$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); }
				catch(Exception $e) { die('ERROR: '.$e->getMessage()); }
				return self::$bdd;
			}
			
			private static $bdd;
			private static $host = '127.0.0.1'; // hôte de la base de donnée
			private static $dbName = 'snake'; // nom de la base de donnée
			private static $encoding = 'utf8'; // encodage à utiliser
			private static $username = 'root'; // utilisateur de connexion
			private static $password = 'toor'; // mot de passe utilisateur
		}
		
		$data = dataBase::connect()->query("SELECT * FROM snake ORDER BY score DESC");
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
		<?php if(isset($_GET['player'])) { echo('<script language="javascript" type="text/javascript" src="./snakeGame.js"></script>'); } ?>
		<script language="javascript" type="text/javascript">
			
		</script>
	</head>
	<body>
		<audio id="sound" style="height: 0; width: 0;">
			<source type="audio/mpeg" src="./snake.mp3" />
		</audio>
		<?php
			if(!isset($_GET['player'])) {
				echo('<div>
					<form method="GET" action>
						<h1><label for="player">Snake Game</label><br /></h1>
						<input type="text" id="player" name="player" placeholder="Player" required /><br />
						<input type="submit" value="Start" />
					</form>
				</div>');
			}
		?>
	</body>
	<script>
		document.getElementById('sound').volume = 0.70;
		var leaderboard = {
			'player': [<?php echo("'$player[0]', '$player[1]', '$player[2]', '$player[3]', '$player[4]', '$player[5]', '$player[6]', '$player[7]', '$player[8]', '$player[9]'"); ?>],
			'score': [<?php echo("$score[0], $score[1], $score[2], $score[3], $score[4], $score[5], $score[6], $score[7], $score[8], $score[9]"); ?>]
		};
		<?php if(!isset($_GET['player'])) { echo("document.getElementById('player').select();"); } ?>
	</script>
</html>
<!-- END -->

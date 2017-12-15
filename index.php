<!DOCTYPE html>
<!-- Snake Game v2 -->
<!-- index.html -->
<html>
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
			'player': ['', '', '', '', '', '', '', '', '', ''],
			'score': [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
		};
	</script>
</html>
<!-- END -->

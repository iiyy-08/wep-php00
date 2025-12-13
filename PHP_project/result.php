<?php
	session_start();
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>결과</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<h2>퀴즈 결과</h2>
			<p>점수 : <?= $_SESSION['score'] ?> / 5</p><br>
			
			<button class="btn" onclick="location.href='main.php'">메인으로</button>
		</div>
	</body>
</html>

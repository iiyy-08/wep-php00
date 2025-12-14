<?php
	// 세션 
	session_start();
	// 로그인 오류
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
		exit;
	}
	
?>

<!DOCTYPE html>
<html lang="ko">
	
	<head>
		<meta charset="UTF-8">
		<title>일본어 단어 공부</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<!-- 난이도 -->
			<h3>난이도 선택</h3>
			<form method="post" action="quiz.php" id="levelForm">
				<input type="hidden" name="level" id="levelInput" value="1">
				<button type="button" class="level-btn" onclick="setLevel(1)">1단계</button><br>
				<button type="button" class="level-btn" onclick="setLevel(2)">2단계</button><br>
				<button type="button" class="level-btn" onclick="setLevel(3)">3단계</button><br>
				<button type="button" class="level-btn" onclick="setLevel(4)">4단계</button><br>
				<button type="button" class="level-btn" onclick="setLevel(5)">5단계</button>
				<br><br>
				<input type="submit" class="btn" value="시작">
			</form>

			<script>
			function setLevel(level) {
				document.getElementById('levelInput').value = level;
				alert('난이도 ' + level + ' 선택됨');
			}
			</script>
			
			<!-- 추가 버튼 -->
			<form method="get" action="rank.php">
				<input type="submit" class="btn" value="순위 보기">
			</form>
			
			<form method="get" action="user_info.php">
				<input type="submit" class="user-opt-btn" value="👤">
			</form>
		</div>
	</body>
</html>
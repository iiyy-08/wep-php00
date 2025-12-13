<?php 

	// 세션
	session_start();
	// 세션 오류
	if (!isset($_SESSION['user_id'])) {
		header("Location: login.php");
		exit;
	}

	// DB 연결
	$conn = mysqli_connect ('localhost', 'root', '');
	if (!$conn) {
		die("데베 연결 실패");
	}
	
	// DB 선택
	mysqli_select_db($conn, "jp_study");
	mysqli_set_charset($conn, "utf8");

	// 사용자 정보
	$user_id = $_SESSION['user_id'];
	$qry = "SELECT username FROM users WHERE user_id=$user_id";
	$rst = mysqli_query($conn, $qry);
	$user = mysqli_fetch_assoc($rst);

	// 푼 문제 수 & 총 점수
	$qry2 = "
	SELECT COUNT(*) AS total_solved, SUM(is_correct) AS total_score
	FROM records
	WHERE user_id=$user_id
	";
	$rst2 = mysqli_query($conn, $qry2);
	$stats = mysqli_fetch_assoc($rst2);

?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>내 정보</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	<body>
		<div class="container">
			<h3>내 정보</h3>
			<p>닉네임: <?= $user['username'] ?></p>
			<p>푼 문제 수: <?= $stats['total_solved'] ?></p>
			<p>총 점수: <?= $stats['total_score'] ?></p>

			<form method="get" action="change_pw.php" style="display:inline;">
				<input type="submit" class="option-btn" value="비밀번호 변경">
			</form>

			<form method="post" action="index.php" style="display:inline;">
				<input type="submit" class="option-btn" value="로그아웃">
			</form>
			<button class="back-btn" onclick="location.href='main.php'"><</button>
			
		</div>
	</body>
</html>

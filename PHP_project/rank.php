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

	$qry = "
			SELECT u.user_id, u.username, SUM(r.is_correct) AS score
			FROM records r
			JOIN users u ON r.user_id = u.user_id
			GROUP BY r.user_id
			ORDER BY score DESC
			LIMIT 10
		";

	$rst = mysqli_query($conn, $qry);
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>현재 랭킹</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<h3>현재 랭킹</h3>

			<table class="rank-tbl">
			<tr>
				<th>순위</th>
				<th>ID</th>
				<th>닉네임</th>
				<th>점수</th>
			</tr>

			<?php
			$rank = 1;
			while ($row = mysqli_fetch_assoc($rst)) {
			?>
			<tr>
				<td><?= $rank++ ?></td>
				<td><?= $row['user_id'] ?></td>
				<td><?= $row['username'] ?></td>
				<td><?= $row['score'] ?></td>
			</tr>
			<?php } ?>
			</table>

			<br>
			<button class="back-btn" onclick="location.href='main.php'"><</button>
		</div>
	</body>
</html>


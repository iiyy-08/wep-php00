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
	
	$level = $_POST['level'];

	$qry = "SELECT * FROM words 
			WHERE level=".$level." 
			ORDER BY RAND() LIMIT 5";

	$rst = mysqli_query($conn, $qry);

?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>문제</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<h3>일본어 5문제 (레벨 <?= $level ?>)</h3>

			<form method="post"  autocomplete="off" action="check.php" >
			<?php
			//다섯 문제
			$i = 1;
			while($row = mysqli_fetch_assoc($rst)) {
				echo "<p>";
				echo $i.". ".$row['jp_word']."<br>";
				echo "<input type='hidden' name='word_id[]' value='".$row['word_id']."'>";
				echo "<input type='text' name='answer[]'>";
				echo "</p>";
				$i++;
			}
			?>
			<input type="submit" class="option-btn" value="제출하기">
			</form>
			<button class="back-btn" onclick="location.href='main.php'"><</button>
		</div>	
	</body>
</html>

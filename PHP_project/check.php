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

	$word_ids = $_POST['word_id'];
	$answers = $_POST['answer'];

	$score = 0;

	for ($i = 0; $i < count($word_ids); $i++) {
    // 문제 정답 조회
    $qry = "SELECT kr_mean FROM words WHERE word_id=".$word_ids[$i];
    $rst = mysqli_query($conn, $qry);
    $row = mysqli_fetch_assoc($rst);

    $is_correct = (trim($answers[$i]) == trim($row['kr_mean'])) ? 1 : 0;

    // 점수 합산
    if ($is_correct) $score++;

    // DB에 기록
    $qry_insert = "INSERT INTO records (user_id, word_id, is_correct) VALUES ('".$_SESSION['user_id']."', ".$word_ids[$i].", $is_correct)";
    mysqli_query($conn, $qry_insert);
	
	$_SESSION['score'] = $score;
}

	echo "<script>";
	echo "alert('문제 끝');";
	echo "location.href='result.php';";
	echo "</script>";
?>
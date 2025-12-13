<?php 
	//세션
	session_start();
	//세션 오류
	if(!isset($_SESSION['user_id'])) {
		header("Location: login.php");
		exit;
	}
?>

<!-- 새 비번 입력 -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>비밀번호 변경</title>
    <link rel="stylesheet" href="JP_P.css">
</head>
<body>
    <div class="container">
        <h3>비밀번호 변경</h3>

        <form method="post" action="change_pw.php">
            <p>
                새 비밀번호: 
                <input type="password" name="new_pw" class="input_field" required>
            </p>
            <input type="submit" class="option-btn" value="변경">
        </form>

        <br>
        <button class="back-btn" onclick="location.href='user_info.php'"><</button>
    </div>
</body>
</html>

<?php
	// 변경 처리
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		// DB 연결
		$conn = mysqli_connect ('localhost', 'root', '');
		if (!$conn) {
			die("데베 연결 실패");
		}
		
		// DB 선택
		mysqli_select_db($conn, "jp_study");
		mysqli_set_charset($conn, "utf8");

		$user_id = $_SESSION['user_id'];
		$new_pw = $_POST['new_pw'];

		$qry = "UPDATE users SET password='$new_pw' WHERE user_id=$user_id";
		mysqli_query($conn, $qry);

		echo "<script>alert('비밀번호가 변경되었습니다.');" ;
		echo "location.href='main.php';";
		echo "</script>";
		
		exit;
	}
?>
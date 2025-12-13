<?php
	// 세션
	session_start();
	
	// DB 연결
	$conn = mysqli_connect ('localhost', 'root', '');
	if (!$conn) {
		die("데베 연결 실패");
	}
	
	// 회원 정보 확인
	if($conn) {
		// DB 선택
		mysqli_select_db($conn, "jp_study");
		mysqli_set_charset($conn,"utf8");
		
		$qry = "SELECT * FROM users WHERE user_id='".$_POST['user_id']."' AND password='".$_POST['password']."'";
		
		$rst = mysqli_query($conn, $qry);
		$nRows = mysqli_num_rows($rst);

		if($nRows == 0) {
			echo "<script>";
			echo "alert ('id 또는 pw를 확인하세요.');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
		$row = mysqli_fetch_assoc($rst);
		$_SESSION['user_id'] = $row['user_id'];
		
		echo "<script>";
		echo "window.location.href='main.php';";
		echo "</script>";
		
	}
	if(is_resource($conn))
		mysqli_close($conn);
	
?>
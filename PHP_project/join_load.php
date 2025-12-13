<?php
	// DB 연결
	$conn = mysqli_connect ('localhost', 'root', '');
	if (!$conn) {
		die("데베 연결 실패");
	}
	
	// 회원 등록
	if($conn) {
		// DB 선택
		mysqli_select_db($conn, "jp_study");
		mysqli_set_charset($conn, "utf8");
		
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		$username = $_POST['username'];
		
		// 중복 체크
		$qry = "SELECT * FROM users WHERE user_id='$user_id'";
		$rst = mysqli_query($conn, $qry);
		if(mysqli_num_rows($rst) > 0){
			echo "<script>
				alert('이미 존재하는 아이디입니다.');
				location.href='join.php';
			</script>";
			exit;
		}

		$qry = "INSERT INTO users (user_id, password, username) VALUES ('$user_id', '$password', '$username')";

		mysqli_query($conn, $qry);

		echo "<script>";
		echo "alert('회원가입 완료');";
		echo "location.href='login.php';";
		echo "</script>";
	}
	if(is_resource($conn))
		mysqli_close($conn);
	
?>
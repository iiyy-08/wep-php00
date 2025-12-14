<?php

	// DB 연결
	$conn = mysqli_connect("localhost", "root", "");
	
	// 연결 체크
	if (!$conn) {
		die("DB 연결 실패: " . mysqli_connect_error());
	}
	
	// DB 생성 및 선택
	
	$db_selected = mysqli_select_db($conn, "jp_study");
	
	if (!$db_selected){
		
		$sql = "CREATE DATABASE IF NOT EXISTS jp_study
				DEFAULT CHARACTER SET utf8
				COLLATE utf8_general_ci";
		
		mysqli_query($conn, $sql);
		
		mysqli_select_db($conn, "jp_study");
		mysqli_set_charset($conn, "utf8");
		
		
		// users 테이블
		$sql = "CREATE TABLE IF NOT EXISTS users (
			user_id INT AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(50) NOT NULL UNIQUE,
			password VARCHAR(255) NOT NULL
		)";
		mysqli_query($conn, $sql);
		
		
		// words 테이블
		$sql = "CREATE TABLE IF NOT EXISTS words (
			word_id INT AUTO_INCREMENT PRIMARY KEY,
			jp_word VARCHAR(100) NOT NULL,
			kr_mean VARCHAR(200) NOT NULL,
			level INT DEFAULT 1,
			is_active TINYINT DEFAULT 1
		)";
		mysqli_query($conn, $sql);
		
		
		// records 테이블
		$sql = "CREATE TABLE IF NOT EXISTS records (
			record_id INT AUTO_INCREMENT PRIMARY KEY,
			user_id INT NOT NULL,
			word_id INT NOT NULL,
			is_correct TINYINT NOT NULL,
			
			FOREIGN KEY (user_id) REFERENCES users(user_id),
			FOREIGN KEY (word_id) REFERENCES words(word_id)
		)";
		mysqli_query($conn, $sql);
		
		
		// 초기 데이터
		$sql = "INSERT INTO words (jp_word, kr_mean, level) VALUES
			-- level 1
			('猫','고양이',1),('犬','개',1),('水','물',1),('火','불',1),('木','나무',1),
			('山','산',1),('川','강',1),('空','하늘',1),('人','사람',1),('目','눈',1),
			('口','입',1),('耳','귀',1),('手','손',1),('足','발',1),('本','책',1),
			('車','차',1),('雨','비',1),('雪','눈',1),('日','해',1),('月','달',1),
			
			-- level 2
			('学校','학교',2),('先生','선생님',2),('学生','학생',2),('友達','친구',2),('家族','가족',2),
			('時間','시간',2),('勉強','공부',2),('仕事','일',2),('会社','회사',2),('電話','전화',2),
			('旅行','여행',2),('映画','영화',2),('音楽','음악',2),('食事','식사',2),('料理','요리',2),
			('天気','날씨',2),('買物','쇼핑',2),('駅','역',2),('電車','전철',2),('病院','병원',2),
			
			-- level 3
			('経験','경험',3),('計画','계획',3),('問題','문제',3),('意見','의견',3),('理由','이유',3),
			('結果','결과',3),('努力','노력',3),('成功','성공',3),('失敗','실패',3),('関係','관계',3),
			('約束','약속',3),('習慣','습관',3),('文化','문화',3),('社会','사회',3),('環境','환경',3),
			('選択','선택',3),('準備','준비',3),('確認','확인',3),('説明','설명',3),('連絡','연락',3),
			
			-- level 4
			('責任','책임',4),('可能性','가능성',4),('価値','가치',4),('影響','영향',4),('判断','판단',4),
			('状況','상황',4),('対策','대책',4),('目標','목표',4),('方法','방법',4),('条件','조건',4),
			('結果的','결과적으로',4),('積極的','적극적',4),('消極的','소극적',4),('重要性','중요성',4),('効率','효율',4),
			('比較','비교',4),('改善','개선',4),('管理','관리',4),('維持','유지',4),('対応','대응',4),
			
			-- level 5
			('抽象的','추상적',5),('具体的','구체적',5),('必然性','필연성',5),('多様性','다양성',5),('合理的','합리적',5),
			('主観的','주관적',5),('客観的','객관적',5),('矛盾','모순',5),('概念','개념',5),('本質','본질',5),
			('相対的','상대적',5),('絶対的','절대적',5),('理論','이론',5),('論理','논리',5),('仮定','가정',5),
			('証明','증명',5),('分析','분석',5),('構造','구조',5),('複雑','복잡',5),('単純','단순',5)
			";
		mysqli_query($conn, $sql);
		
		// 테스트용 사용자 쿼리
		$sql = "INSERT INTO users (user_id, username, password) VALUES
			('202168058', '양인영', 'pass1'),
			('1', 'user2', 'pass2')";
		mysqli_query($conn, $sql);
		
		$sql = "INSERT INTO records (user_id, word_id, is_correct) VALUES
			(1, 1, 1),
			(1, 2, 1),
			(1, 3, 1),
			(1, 4, 0),
			(1, 5, 0)";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO records (user_id, word_id, is_correct) VALUES
			(202168058, 1, 1),
			(202168058, 2, 1),
			(202168058, 3, 1),
			(202168058, 4, 1),
			(202168058, 5, 1)";
		mysqli_query($conn, $sql);
		
	}
	
	header("Location: index.php");
	exit;
	
?>

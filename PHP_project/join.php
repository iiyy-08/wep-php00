<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>회원가입</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<h2>회원가입</h2>
				<form method="post" action="join_load.php">
					<table class="form-table">
					<tr>
						<td>ID</td>
						<td><input type="text" name="user_id"></td>
					</tr>
					<tr>
						<td>PW</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>닉네임</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" class="btn" value="회원가입">
						</td>
					</tr>
					</table>
				</form>
			<button class="back-btn" onclick="location.href='index.php'"><</button>
		</div>
	</body>
</html>

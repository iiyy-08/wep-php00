<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>로그인</title>
		<link rel="stylesheet" href="JP_P.css">
	</head>
	
	<body>
		<div class="container">
			<h2>로그인</h2>
				<form method="post" action="login_load.php">
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
						<td colspan="2">
							<input type="submit" class="btn" value="Login">
						</td>
					</tr>
					</table>
				</form>
			<button class="back-btn" onclick="location.href='index.php'"><</button>
		</div>
	</body>
</html>

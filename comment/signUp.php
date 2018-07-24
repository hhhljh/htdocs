<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SIGN UP</title>
</head>
<body>
	<form action="./signUp_action.php" method="post">
		<fieldset><legend>SIGN UP</legend>
			<h1>Input Your Information</h1>
			<table border="1">
			<tr>
				<td>&nbsp&nbspID</td>
				<td><input type="text" name="id" size="40"></td>
			</tr>
			<tr>
				<td>&nbsp&nbspPassword&nbsp&nbsp</td>
				<td><input type="password" name="pw" size="40"></td>
			</tr>
			<tr>
				<td>&nbsp&nbspName</td>
				<td><input type="text" name="name" size="40"></td>
			</tr>
			<tr>
				<td>&nbsp&nbspBirth</td>
				<td><input type="text" name="birth" size="40"></td>
			</tr>
			<tr>
				<td>&nbsp&nbspE-Mail</td>
				<td><input type="text" name="email" size="40"></td>
			</tr>
			</table>
			<button type="submit">Sign UP</button>
		</fieldset>
	</form>
</body>
</html>
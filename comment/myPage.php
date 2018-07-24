<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<fieldset><legend>MY PAGE</legend>
		<h1>Your Information</h1>
		<table border="1">
		<tr>
			<td>&nbsp&nbspID</td>
			<td><?php echo "{$_SESSION['member']['id']}"; ?></td>
		</tr>
		<tr>
			<td>&nbsp&nbspPassword&nbsp&nbsp</td>
			<td><?php echo "{$_SESSION['member']['pw']}"; ?></td>
		</tr>
		<tr>
			<td>&nbsp&nbspName</td>
			<td><?php echo "{$_SESSION['member']['name']}"; ?></td>
		</tr>
		<tr>
			<td>&nbsp&nbspBirth</td>
			<td><?php echo "{$_SESSION['member']['birth']}"; ?></td>
		</tr>
		<tr>
			<td>&nbsp&nbspE-Mail</td>
			<td><?php echo "{$_SESSION['member']['email']}"; ?></td>
		</tr>
		</table>
		<a href="./update.php">수정</a>
		<a href="./">취소</a>
	</fieldset>	
</body>
</html>
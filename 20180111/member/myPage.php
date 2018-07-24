<fieldset><legend>MY PAGE</legend>
	<h1>Your Information</h1>
	<table border="1">
	<tr>
		<td>&nbsp;&nbsp;ID</td>
		<td><?php echo "{$_SESSION['member']['id']}"; ?></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;Password&nbsp;&nbsp;</td>
		<td><?php echo "{$_SESSION['member']['pw']}"; ?></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;Name</td>
		<td><?php echo "{$_SESSION['member']['name']}"; ?></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;Birth</td>
		<td><?php echo "{$_SESSION['member']['birth']}"; ?></td>
	</tr>
	<tr>
		<td>&nbsp;&nbsp;E-Mail</td>
		<td><?php echo "{$_SESSION['member']['email']}"; ?></td>
	</tr>
	</table>
	<a href="./?type=member&amp;page=update">수정</a>
	<a href="./">취소</a>
</fieldset>	
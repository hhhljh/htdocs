<style>
	textarea{width:100%;}
</style>
<form action="" method="post">
	<input type="hidden" name="action" value="write">
	<table border="1" width="100%">
		<tr height="40">
			<td>작성자</td>
			<td><?php  echo $member_info['id'] ?></td>
		</tr>
		<tr>
			<td>제목</td>
			<td><textarea type="text" name="subject"></textarea></td>
		</tr>
		<tr>
			<td>내용</td>
			<td><textarea type="text" name="content"></textarea></td>
		</tr>
	</table>
	<br>
	<button type="submit">SUBMIT</button>
	<a href="./">취소</a>
	<br>
</form>
<table width="100%" border="1">
	<colgroup>
		<col width="10%">
		<col width="60%">
		<col width="15%">
		<col width="15%">
	</colgroup>
	<thead>
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>작성일</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$list = $db->query("SELECT * FROM board order by idx desc")->fetchAll();
			foreach($list as $data){
		?>
		<tr>
			<td><?php echo $data['idx']?></td>
			<td><a href="./?type=board&amp;page=view&amp;
				idx=<?php echo $data['idx']?>"><?php echo $data['subject']?></a></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['date']?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<?php if ($is_member): ?>
<a href="./?type=board&amp;page=write">글작성</a>
<?php endif ?>
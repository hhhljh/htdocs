<?php 
	$list = $db->query("SELECT * FROM board WHERE cidx='{$cidx}' order by idx desc")->fetchAll();
 ?>
	<table width="100%"  border="1">
		<colgroup>
			<col width="10%">
			<col width="60%">
			<col width="15%">
		</colgroup>
		<thead>
			<tr>
				<th>번호</th>
				<th>제목</th>
				<th>작성일</th>
			</tr>
		</thead>
		<tbody>
			<?php 
		foreach ($list as $data) {
		 	?>
			<tr>
				<td><?php echo $data['idx']; ?></td>
				<td><a href="./?type=board&amp;page=view&amp;idx=<?php echo $data['idx']?>&amp;cidx=<?php echo $cidx ?>"><?php echo $data['subject'] ?></td>
				<td><?php echo $data['date'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php if($is_member && ($category_info['lv'] <= $member_info['lv'])){ ?>
	<a href="./?type=board&amp;page=write&amp;cidx=<?php echo $cidx?>">글작성</a>
<?php } ?>
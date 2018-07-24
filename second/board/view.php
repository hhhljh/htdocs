<?php 
 $data = $db->query("SELECT * FROM `board` WHERE idx='{$idx}'  and cidx='{$cidx}'")->fetch();
 ?>
<table border="1" width="100%">
	<tr height="40">
		<td>제목</td>
		<td><?php echo $data['subject'] ?></td>
	</tr>
	<tr height="300">
		<td>내용</td>
		<td><?php echo $data['content'] ?></td>
	</tr>
	<tr height="30">
		<td>작성일</td>
		<td><?php echo $data['date'] ?></td>
	</tr>
</table>
<br>
<hr>
<form action="" method="post">
	<input type="hidden" name="action" value="comment_write">
	<table>
		<tr>
			<th><label>작성자</label></th>
			<td><?php echo $member_info['name'] ?></td>
		</tr>
		<tr>
			<th><label>댓글</label></th>
			<td><textarea type="text" name="content" width="600"></textarea></td>
		</tr>
		<br>
	 </table>
	 <input type="submit" value="작성">
</form>
<fieldset>
	<strong>COMMENT</strong>
	<?php 
		$list = $db->query("SELECT * FROM comment_detail WHERE bidx='{$idx}' order by `date` desc")->fetchAll();
		foreach($list as $data){
			$delete = "";
			if($is_member && ($data['midx'])==$member_info['idx'] || $member-info['lv']==2){
				$delete = ' | <a href="./?type=board&amp;page=comment_delete&amp;idx='.$data['idx'].'">삭제</a>';
			}
			echo "<p>{$data['name']} | {$data['content']} | {$data['date']}	{$delete}</p>";
		}
	 ?>
</fieldset>

<?php
	$this_delete = ""; 
	if ($is_member && ($data['midx']==$member_info['idx'] || $member_info['lv'] ==2)){ 
		$this_delete= ' / <a href="./?type=board&amp;page=delete&amp;idx='.$data['idx'].'">삭제</a>';
		}	
	?>
<a href="./">목록</a>
<?php echo "{$this_delete}"; ?>
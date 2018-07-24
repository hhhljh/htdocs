<style>
ul, li{list-style:none;}
</style>
<?php 
	$data = $db->query("SELECT * FROM board WHERE idx='{$idx}' and cidx='{$cidx}'")->fetch();
	$total_likes = $db->query("SELECT * FROM likes where bidx='{$idx}'")->rowCount();
?>
<?php if($category_info['type']=='gallery'){ ?>
	<table width="100%" border="2">
		<tr height="70">
			<td width="10%">제목</td>	
			<td><?php echo $data['subject']?></td>
		</tr>
		<tr height="300">
			<td width="10%">내용</td>	
			<td>
				<ul>
					<?php if($data['file'] != ''){ ?>
					<li><img src="./data/<?php echo $data['file_name']?>" alt="<?php echo $data['file']?>" height="500"></li>
					<?php } ?>
					<li><?php echo $data['content'];?></li>
				</ul>	
			</td>
		</tr>
		<tr height="30">
			<td width="10%">작성일</td>
			<td><?php echo $data['date'] ?></td>	
		</tr>
	</table>
<?php } else {?>

<table border="1" width="100%">
	<tr height="100">
		<td width="10%">제목</td>
		<td><?php echo $data['subject'] ?></td>
	</tr>
	<tr height="300">
		<td width="10%">내용</td>
		<td><?php echo $data['content'] ?></td>
	</tr>
	<tr height="40">
		<td width="10%">작성일</td>
		<td><?php echo $data['date'] ?></td>
	</tr>
</table>
<?php } ?>

<form action=" " method="post">
	<table>
		<input type="hidden" name="action" value="comment_insert">
		<tr>
			<th scope="row"><label>작성자</label></th>
			<td><?php echo $member_info['name'] ?></td>
		</tr>
		<tr>
			<th scope="row"><label>코멘트</label></th>
			<td><textarea type="text" name="content" style="width:700px"></textarea></td>
		</tr>
		<br>
		<hr size="5" color="gray">
	</table>
	<div>
		<input type="submit" value="코멘트 작성" style="background:none;border:2px solid gray;padding:5px 10px">
	</div>
</form>
<p>총 추천 횟수 <?php echo $total_likes?></p>
<?php  if($is_member):
	$likes = $db->query("SELECT * FROM likes where bidx='{$idx}' and midx='{$member_info['idx']}'")->rowCount();
?>
<form action="" method="post">
	<input type="hidden" name="idx" value="<?php echo $idx?>">
	<?php if ($likes == 0): ?>
	<button type="submit" name="action" value="like" style="font-size:50px;background:none;border:none;padding:10px">♡</button>		
	<?php else: ?>
	<button type="submit" name="action" value="unlike" style="font-size:50px;background:none;border:none;padding:10px">♥</button>
	<?php endif ?>
</form>
<?php endif ?>
<fieldset>
	<strong>COMMENT</strong>
	<?php 
		$list = $db->query("SELECT * FROM comment_detail WHERE bidx='{$idx}' order by `date` desc")->fetchAll();
		foreach ($list as $data) {
			$delete = "";
			if($is_member && ($data['midx']==$member_info['idx'] || $member_info['lv']==2)){
				$delete = ' / <a href="./?type=board&amp;page=comment_delete&amp;idx='.$data['idx'].'">삭제</a>';
			}
			echo "<p>{$data['name']} / {$data['content']} / {$data['date']}{$delete}</p>";
		}
	?>
</fieldset>
<?php
	$this_delete = "";
	if ($is_member && ($data['midx']==$member_info['idx'] || $member_info['lv'] == 2)) {
		$this_delete = ' / <a href="./?type=board&amp;page=delete&amp;idx='.$data['idx'].'">삭제</a>';
	}
 ?>
<a href="./">목록</a>
<?php echo "{$this_delete}"; ?>
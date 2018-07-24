<fieldset>
	<strong>COMMENT</strong>
	<table>
		<hr>
	<?php 
		$list = $db->query("SELECT *FROM comment WHERE bidx='{$_GET['idx']}' order by idx desc")->fetchAll();
		foreach ($list as $data) {
		 ?>	
		 <tr>
			<td>Comment</td>
			<td><?php echo $data['Cocomment']; ?></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><?php echo $data['date']; ?></td>
		</tr>
		<?php } ?>
		<br>
	</table>
	<br>
</fieldset>
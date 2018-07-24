<?php
	$db = new PDO("mysql:host=127.0.0.1;dbname=20180130;charset=utf8","root","");
	$sql = "
		SELECT 	max(q_sum) as sum,
				product
		from (
				SELECT 	reserve.*,
						floor((member.age)/10) as age_group,
						sum(reserve.quantity) as q_sum,
						count(reserve.product) as p_cnt
				FROM `member` JOIN reserve ON reserve.name=member.name
				GROUP BY product, age_group
			) t
		group by t.age_group;
	";
	$list = $db->query($sql)->fetchAll();
	$total = 0;
	$image = imagecreatetruecolor(400, 400);
	foreach ($list as $key => $data) {
		$total += $data['sum'];
	}
	$start = $end = 0;
	$white = imagecolorallocate($image, 255, 255, 255);
	imagefill($image,0,0,$white);
	foreach ($list as $key => $data) {
		$end = ($data['sum']/$total)*360 + $start;
		$color    = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
		imagefilledarc($image, 200, 200, 400, 400, $start, $end, $color, IMG_ARC_PIE);
		$start = $end;
	}
	// $gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
	// $darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
	// imagefilledarc($image, 250, 250, 500, 500, 75, 160 , $gray, IMG_ARC_PIE);
	// imagefilledarc($image, 250, 250, 500, 500, 160, 240 , $darkgray, IMG_ARC_PIE);
	// imagefilledarc($image, 250, 250, 500, 500, 240, 360 , $gray, IMG_ARC_PIE);
	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);
?>
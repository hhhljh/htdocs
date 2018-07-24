<?php
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=first;charset=utf8;","root","");
	$is_member = isset($_SESSION['member']);
	$member_info = $is_member ? $_SESSION['member'] : NULL ;
	$type = isset($_GET['type'])? $_GET['type'] : 'board';
	$page = isset($_GET['page'])? $_GET['page'] : 'list';
	$idx = isset($_GET['idx'])? $_GET['idx'] : NULL;
	$cidx = isset($_GET['cidx']) ? $_GET['cidx'] : 0;
	$category_info = $db->query("SELECT * FROM category where idx='{$cidx}'")->fetch();

	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}

	function move($url = false){
		echo "<script>";
		echo $url ? "location.replace('{$url}')" : 'history.back();';
		echo "</script>";
		exit;
	}

	function access($bool, $msg, $url = false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
<?php
	include_once("./config/config.php");
	include_once("./page/header.php");
	if(!isset($page)){
		include_once("./page/main.php");
	} else {
		if (isset($_POST['action'])) {
			include_once("./page/{$type}/action.php");
			exit; 
		}
		include_once("./page/{$type}/{$page}.php");
	}
	include_once("./page/footer.php");
?>
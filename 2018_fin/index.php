<?php
	define("DIR_PATH",__DIR__);
	define("APP_PATH",DIR_PATH."/application");
	define("CONFIG_PATH",APP_PATH."/config");
	define("CORE_PATH",APP_PATH."/core");
	define("CONTROLLER_PATH",APP_PATH."/controller");
	define("MODEL_PATH",APP_PATH."/model");
	define("VIEW_PATH",APP_PATH."/view");
	define("DATA_PATH",APP_PATH."/data");

	define("HOME_URL","");

	include_once(CONFIG_PATH."/lib.php");
	Application::run();
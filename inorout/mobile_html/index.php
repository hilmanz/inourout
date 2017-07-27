<?php 
ob_start();
include_once "common.php";

include_once $APP_PATH.MOBILE_APPS."/App.php";
include_once $ENGINE_PATH."Utility/Debugger.php";
$logger = new Debugger();
$logger->setAppName(MOBILE_APPS);
$logger->setDirectory($CONFIG['LOG_DIR']);
$app = new App();
$app->main();

print $app;
die();
?>

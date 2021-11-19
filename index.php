<?php
$thisUrl = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($thisUrl, '/');
$url = explode('/', $thisUrl);

if (isset($url[0]) && $url[0] == 'en') {
    require 'en/index.php';
} else {
	require 'libs/startup.php';
	require 'libs/database.php';
	require 'libs/functions.php';
	require 'libs/model.php';
	require 'libs/controller.php';
}
?>
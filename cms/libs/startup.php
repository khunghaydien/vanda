<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    // ini_set('display_errors', 1);
    define('DOMAIN', $_SERVER['HTTP_HOST'].'/vandavn/cms');
    define('SID', md5(DOMAIN));
    define('HOME', 'http://'.$_SERVER['HTTP_HOST']);
    define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/vandavn/cms');
    define('CMS', 'http://'.$_SERVER['HTTP_HOST'].'/vandavn/cms');
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'vanda_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
?>
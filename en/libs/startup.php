<?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    // ini_set('display_errors', 1);
    define('DOMAIN', $_SERVER['HTTP_HOST'].'/vandavn/en');
    define('SID', md5(DOMAIN));
    define('HOME_VI', 'http://' . $_SERVER['HTTP_HOST'].'/vandavn');
    define('HOME', 'http://'.$_SERVER['HTTP_HOST'].'/vandavn/en');
    define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/vandavn/en');
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/vandavn/en');
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'vanda_en');
    define('DB_USER', 'root');
    define('DB_PASS', '');
?>
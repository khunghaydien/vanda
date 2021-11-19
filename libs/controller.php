<?php
$thisUrl = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($thisUrl, '/');
$url = explode('/', $thisUrl);
$data = new model();

if ($url[0] != '') {
    if ($url[0] == 'blog') {
        if (sizeof($url) == 2)
            // chi tiet bai viet
            $view = 'blog-detail';
        else if (sizeof($url) == 3)
            // danh muc bai viet
            $view = 'blog-category';
        else
            // tat ca bai viet
            $view = 'blog';
    } else if ($url[0] == 'product') {
        if (sizeof($url) == 2)
            // chi tiet san pham
            $view = 'product-detail';
        else if (sizeof($url) == 3)
            // danh muc san pham
            $view = 'product-category';
        else
            // tat ca san pham
            $view = 'product';
    } else {
        // cac view khac
        $view = $url[0];
    }
} else {
    // mac dinh trang chu
    $view = 'index';
}
// thông tin từng trang web
$page = $data->pageInfo($url);
// thông tin chung của trang web
$infoModel = $data->info();
$info = array();
foreach ($infoModel as $value) {
    $info[$value['key_info']] = $value['value'];
}
// menu header
$menu = $data->topMenu();

// kiem tra file view co ton tai hay khong
if (file_exists('views/' . $view . '.php')) {
    switch ($view) {
        // trang không require header footer
        case 'authenticate':
        case 'actioncart':
            require 'views/' . $view . '.php';
            break;
        // trang còn lại sẽ require header footer
        default:
            require('layout/header.php');
            require 'views/' . $view . '.php';
            require('layout/footer.php');
            break;
    }
} else {
    // trả về các trang không tồn tại
    require('layout/header.php');
    require 'views/err.php';
    require('layout/footer.php');
}

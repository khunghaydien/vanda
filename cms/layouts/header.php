<!doctype html>
<html class="no-js" lang="en">
<!-- 11-06-2021 @HG -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang quản trị website</title>
    <base href="<?php echo URL ?>/">
    <meta name="description" content="Phần mềm chăm sóc khách hàng - YBC.VN, cung cấp bởi VELO Software">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="https://gemstech.com.vn/template/assets/img/favicon.png">
    <link rel="stylesheet" href="template/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="template/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="template/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="template/vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- fix lỗi datatable -->
    <script src="template/vendors/jquery/jquery-3.5.1.js"></script>
</head>
<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="https://gemstech.com.vn/uploads/home/logo-2.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="template/images/Logo_HFH_small.png" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <?php if ($_SESSION['admin']['nhom'] > 2) {?>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="baiviet"> <i class="menu-icon fa fa-dashboard"></i>Bài viết </a>
                        </li>
                    </ul>
                <?php }else {?>
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <h3 class="menu-title" style="color:#FFF">Cài đặt</h3><!-- /.menu-title -->
                        <li>
                            <a href="thongtin"> <i class="menu-icon fa fa-laptop"></i>Thông tin website</a>
                        </li>
                        <li>
                            <a href="users"> <i class="menu-icon fa fa-users"></i>Tài khoản</a>
                        </li>
                        <li>
                            <a href="media"> <i class="menu-icon fa fa-table"></i>Quản lý media</a>
                        </li>
                        <li>
                            <a href="menu"> <i class="menu-icon fa fa-th"></i>Top menu</a>
                        </li>
                        <li>
                            <a href="banner"> <i class="menu-icon fa fa-list-alt"></i>Banner</a>
                        </li>
                        <?php if ($_SESSION['admin']['id'] ==1){ ?>
                            <li>
                            <a href="thuoctinh"><i class="menu-icon fa fa-plus-square"></i>Thuộc tính</a>
                        </li>
                        <?php } ?>

                        <h3 class="menu-title" style="color:#FFF">Website</h3><!-- /.menu-title -->

                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Bài viết</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-fort-awesome"></i><a href="danhmuc">Danh mục</a></li>
                                <li><i class="menu-icon fa fa-pie-chart"></i><a href="baiviet">Bài viết</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Sản phẩm</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-line-chart"></i><a href="danhmucsp">Danh mục</a></li>
                                <li><i class="menu-icon fa fa-area-chart"></i><a href="sanpham">Sản phẩm</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="dathang"> <i class="menu-icon fa fa-th"></i>Báo giá đơn hàng</a>
                        </li>
                        <h3 class="menu-title" style="color:#FFF">Khách hàng</h3><!-- /.menu-title -->
                        <li>
                            <a href="dangky"> <i class="menu-icon fa fa fa-glass"></i>Liên hệ</a>
                        </li>
                        <!-- <li>
                            <a href="phanhoi"> <i class="menu-icon fa fa-group (alias)"></i>Phản hồi</a>
                        </li> -->
                        <li>
                            <a href="doitac"><i class="menu-icon fa fa-plus-square"></i>Đối tác</a>
                        </li>
                    <!--  <li>
                            <a href="dangky"> <i class="menu-icon fa fa fa-plus-square"></i>Khách hàng đăng ký</a>
                        </li> -->
                    </ul>
                <?php }?>
                
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="template/images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="template/images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="template/images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="template/images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="template/images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>
                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->
                            <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <!-- <div class="language-select dropdown " id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <img class="user-avatar rounded-circle" src="template/images/admin.jpg" alt="User Avatar" height="30">
                        </a>
                        <div class="dropdown-menu float-left" aria-labelledby="language">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>
                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div> -->
                    <!-- <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

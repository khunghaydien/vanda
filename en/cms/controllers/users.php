<?php
class users extends controller
{
    function __construct()
    {
        parent::__construct();
        if ($_SESSION['admin']['nhom'] > 2)
            header('Location: ' . URL.'/baiviet');
    }

    function index()
    {
        require('layouts/header.php');
        $this->view->data = $this->model->getdata();
        $this->view->render('users');
        require('layouts/footer.php');
    }

    function getrow()
    {
        $id = $_REQUEST['id'];
        $data = $this->model->getrow($id);
        if (count($data)>0) {
            $jsonObj['data'] = $data[0];
            $jsonObj['success'] = true;
        } else {
            $jsonObj['err'] = 'Lỗi đọc dữ liệu từ máy chủ';
            $jsonObj['success'] = false;
        }
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('json');
    }

    function save()
    {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $tendangnhap = $_REQUEST['username'];
        $username = md5($tendangnhap);
        $password = $_REQUEST['password'];
        $nhom = $_REQUEST['nhom'];
        if ($password!='') {
            $password = md5(md5($password));
            $data = ['name'=>$name, 'ten_dang_nhap'=>$tendangnhap,'username'=>$username,'nhom'=>$nhom,'password'=>$password];
        }else{
            $data = ['name'=>$name, 'ten_dang_nhap'=>$tendangnhap,'username'=>$username,'nhom'=>$nhom];
        }

        require 'layouts/header.php';
        if ($this->model->saverow($id,$data)) {
            $this->view->thongbao = 'Cập nhật thành công! <a href="users">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Cập nhật không thành công! <a href="users">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

    function del()
    {
        $id = $_REQUEST['id'];
        $data = ['tinh_trang'=>0];
        require 'layouts/header.php';
        if ($this->model->saverow($id,$data)) {
            $this->view->thongbao = 'Đã xóa bản ghi! <a href="users">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="users">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }
}
?>

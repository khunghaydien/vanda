<?php
class doitac extends controller
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
        $this->view->render('doitac');
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
        $hinhanh = $_REQUEST['hinhanh'];
        $dienthoai = $_REQUEST['dienthoai'];
        $diachi = $_REQUEST['diachi'];
        $url = $_REQUEST['url'];
        $hienthi = isset($_REQUEST['hienthi'])?1:0;
        $data = ['ten'=>$name,'url'=>$url, 'hinh_anh'=>$hinhanh,'dien_thoai'=>$dienthoai,'dia_chi'=>$diachi,'hien_thi'=>$hienthi];
        require 'layouts/header.php';
        if ($this->model->save($id,$data)) {
            $this->view->thongbao = 'Cập nhật thành công! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Cập nhật không thành công! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

    function del()
    {
        $id = $_REQUEST['id'];
        require 'layouts/header.php';
        if ($this->model->del($id)) {
            $this->view->thongbao = 'Đã xóa bản ghi! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }
    function hienthi()
    {
        $id = $_REQUEST['id'];
        require 'layouts/header.php';
        if ($this->model->hienthi($id)) {
            $this->view->thongbao = 'Đã thay đổi trạng thái hiển thị! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Có lỗi khi thay đổi trạng thái! <a href="doitac">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }
}
?>

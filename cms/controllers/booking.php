<?php
class booking extends controller
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
       $this->view->render('booking');
       require('layouts/footer.php');
   }

   function xoa(){
       $id = $_REQUEST['id'];
       $data=['tinh_trang'=>0];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Đã xóa thành công! <a href="booking">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Xóa không thành công! <a href="booking">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function save()
   {
       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $mota = $_REQUEST['mota'];
       $vitri = $_REQUEST['vitri'];
       $hinhanh = $_REQUEST['hinhanh'];
       $data = ['name'=>$name,'mo_ta'=>$mota,'hinh_anh'=>$hinhanh,'com'=>$vitri];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="booking">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="booking">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

}
?>

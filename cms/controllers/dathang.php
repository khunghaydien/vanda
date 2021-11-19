<?php
class dathang extends controller
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
       $this->view->render('dathang');
       require('layouts/footer.php');
   }

   function save()
   {
       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $address = $_REQUEST['address'];
       $phone = $_REQUEST['phone'];
       $email = $_REQUEST['email'];
       $status = $_REQUEST['status'];
       $note = $_REQUEST['note'];
      
       $data = ['name'=>$name,'address'=>$address,'phone'=>$phone,'email'=>$email,'status'=>$status,'note'=>$note];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="dathang">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="dathang">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
   function del()
   {
       $id = $_REQUEST['id'];
       require 'layouts/header.php';
       if ($this->model->del($id)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="banner">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="banner">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>

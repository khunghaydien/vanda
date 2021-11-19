<?php
class danhmucsp extends controller
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
       $data = $this->model->getdata();
       $this->view->data = functions::dequy($data,0,0);
       $this->view->render('danhmucsp');
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
        $status = $_REQUEST['status'];
       $url = ($_REQUEST['url']!='')?$_REQUEST['url']:functions::convertname($name);
       $hinhanh = $_REQUEST['hinhanh'];
       $mota = $_REQUEST['mota'];
       $cha=$_REQUEST['danhmuccha'];
       $position=$_REQUEST['position'];
       $data = ['name'=>$name, 'description'=>$mota,'image'=>$hinhanh,'url'=>$url,'cha'=>$cha,'position'=>$position, 'status'=> $status];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function del()
   {
       $id = $_REQUEST['id'];
       $data = ['status'=>0];
       require 'layouts/header.php';
       if ($this->model->del($id,$data)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="danhmucsp">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>

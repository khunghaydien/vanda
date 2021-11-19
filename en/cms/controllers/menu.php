<?php
class menu extends controller
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
       $this->view->baiviet = $this->model->baiviet();
       $this->view->danhmuc = $this->model->danhmuc();
       $this->view->sanpham = $this->model->sanpham();
       $this->view->loaisanpham = $this->model->loaisanpham();
       $this->view->render('menu');
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
       $thutu = $_REQUEST['thutu'];
       $phanloai = $_REQUEST['phanloai'];
       if ($phanloai==1)
          $url = 'blog/'.$_REQUEST['baiviet'];
       elseif ($phanloai==2)
          $url = 'blog/1/'.$_REQUEST['danhmuc'];
       elseif ($phanloai==3)
          $url = 'product/'.$_REQUEST['sanpham'];
       elseif ($phanloai==4)
          $url = 'product/1/'.$_REQUEST['loaisanpham'];
       else
          $url = $_REQUEST['url'];
       $sub = $_REQUEST['sub'];
       $cha = $_REQUEST['cha'];
       $data = ['name'=>$name, 'url'=>$url,'type'=>$phanloai,'cha'=>$cha,'sub_menu'=>$sub,'position'=>$thutu];
       require 'layouts/header.php';
       if ($this->model->save($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="menu">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="menu">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }

   function del()
    {
        $id = $_REQUEST['id'];
        $data = ['status'=>0];
        require 'layouts/header.php';
        if ($this->model->save($id,$data)) {
            $this->view->thongbao = 'Đã xóa bản ghi! <a href="menu">Nhấn vào đây để quay lại</a>';
            $this->view->render('thongbao');
        } else {
            $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="menu">Nhấn vào đây để quay lại</a>';
            $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }
}
?>

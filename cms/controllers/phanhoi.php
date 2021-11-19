<?php
class phanhoi extends controller
{
   function __construct()
   {
       parent::__construct();
       if ($_SESSION['admin']['nhom'] > 2)
            header('Location: ' . URL.'/baiviet');
   }

   function index()
   {
       require 'layouts/header.php';
       $this->view->data = $this->model->getFetObj();
       $this->view->render('phanhoi');
       require 'layouts/footer.php';
   }


   function xoa()
   {
       $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
       require 'layouts/header.php';
       if ($this->model->delObj($id)) {
           $this->view->thongbao = 'Xóa thành công! <a href="phanhoi">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Xóa không thành công! <a href="phanhoi">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }


   function save()
   {
       $id = $_REQUEST['id'];
       $name = $_REQUEST['name'];
       $hinhanh = $_REQUEST['hinhanh'];
       $nhanxet = $_REQUEST['nhanxet'];
       $data = ['author'=>$name,'avatar'=>$hinhanh,'content'=>$nhanxet,'status'=>1];
       
       require 'layouts/header.php';
       if ($this->model->saverow($id,$data)) {
           $this->view->thongbao = 'Cập nhật thành công! <a href="phanhoi">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Cập nhật không thành công! <a href="phanhoi">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>

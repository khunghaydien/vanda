<?php
class baiviet extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       require('layouts/header.php');
       // $this->view->data = $this->model->getdata();
       // $this->view->danhmuc = $this->model->danhmuc();
       $this->view->render('baiviet/index');
       require('layouts/footer.php');
   }



   function getdata()
    {
        // Search
        $keyword = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $keyword = utf8_decode($keyword);
        // Order
        $offset = $_REQUEST['start'];
        $rows = $_REQUEST['length'];
        $query = $this->model->getdata2($keyword, $offset, $rows);
        $totalData = $query['total'];
        $totalFilter = $totalData;
        $data = array();
       foreach ($query['rows'] as $key => $value) {
           $subdata = array();
           $subdata[] = $key+1;
           $subdata[] = $value['updated'];
           $subdata[] = $value['title'];
           $subdata[] = $value['url'];
           $subdata[] = '<img src="'.$value['avatar'].'" height="60">';
           $subdata[] = $value['category'];
           $subdata[] = $value['nhanvien'];
           $subdata[] = '<a href="baiviet/edit?id='.$value['id'].'" ><i class="fa fa-edit"></i></a>';
           $subdata[] = ($value['id'] != 1)? '<a href="javascript:void(0)" onclick="del('.$value['id'].')"><i class="fa fa-trash-o"></i></a>': '';
           $data[] = $subdata;
       }
        $json_data = array(
            "draw" => intval($_REQUEST['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFilter),
            "data" => $data
        );

        echo json_encode($json_data);
    }

     function add()
    {
        require 'layouts/header.php';
        $this->view->danhmuc     = $this->model->danhmuc();
        $this->view->render('baiviet/add');
        require 'layouts/footer.php';
    }

    function edit()
    {
        
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $data = $this->model->getrow($id);
        if ($_SESSION['admin']['nhom'] > 2 && $_SESSION['admin']['id'] != $data['author']){
            header('Location: ' . URL.'/baiviet');
        }else{
            require 'layouts/header.php';
            $this->view->data        = $data;
            $this->view->danhmuc     = $this->model->danhmuc();
            $this->view->render('baiviet/edit');
            require 'layouts/footer.php';
        }
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

   function addsave()
    {
        $id=0;
        $name    = $_REQUEST['name'];
        if ($_REQUEST['url']=='')
            $url     = functions::convertname($name);
        else
            $url = $_REQUEST['url'];
        if ($_REQUEST['link_anh']=='') {
            $tenFile = functions::convertname($name);
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {
            $dir = ROOT_DIR.'/uploads/baiviet/';  
              $file = functions::uploadfile('hinh_anh',$dir,$tenFile);
              $hinhanh =HOME.'/uploads/baiviet/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $mota  = $_REQUEST['mo_ta'];
      $danhmuc = $_REQUEST['danh_muc'];
      $sapxep = $_REQUEST['com'];
      $tag = $_REQUEST['tag'];
      $view = $_REQUEST['views'];
      $noidung = $_REQUEST['noi_dung'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'url' => $url,
                  'title' => $name,
                  'avatar' => $hinhanh,
                  'description' => $mota,
                  'content' => $noidung,
                  'tag'=>$tag,
                  'view'=>$view,
                  'category' => $danhmuc,
                  'position' => $sapxep
              );
       require 'layouts/header.php';
        if ($this->model->save($id,$data)){
            $this->view->thongbao = 'Cập nhật thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
        }
        else{
             $this->view->thongbao = 'Cập nhật không thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>'.$id;
           $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

    function editsave()
    {
      $id= $_REQUEST['id'];
      $name    = $_REQUEST['name'];
      if ($_REQUEST['url']=='')
         $url     = functions::convertname($name);
      else
         $url = $_REQUEST['url'];
      if ($_REQUEST['link_anh']=='') {
            $tenFile = functions::convertname($name);
            if (isset($_FILES['hinh_anh']['name']) && ($_FILES['hinh_anh']['name']!='')) {
            $dir = ROOT_DIR.'/uploads/baiviet/';  
              $file = functions::uploadfile('hinh_anh',$dir,$tenFile);
              $hinhanh =HOME.'/uploads/baiviet/'.$file;
            }else
              $hinhanh = 'http://via.placeholder.com/360x225';
      }else
          $hinhanh = $_REQUEST['link_anh'];
      $mota  = $_REQUEST['mo_ta'];
      $danhmuc = $_REQUEST['danh_muc'];
      $sapxep = $_REQUEST['com'];
      $tag = $_REQUEST['tag'];
      $view = $_REQUEST['views'];
      $noidung = $_REQUEST['noi_dung'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'url' => $url,
                  'title' => $name,
                  'avatar' => $hinhanh,
                  'description' => $mota,
                  'content' => $noidung,
                  'tag'=>$tag,
                  'view'=>$view,
                  'category' => $danhmuc,
                  'position' => $sapxep
              );
       require 'layouts/header.php';
        if ($this->model->save($id,$data)){
            $this->view->thongbao = 'Cập nhật thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
        }
        else{
             $this->view->thongbao = 'Cập nhật không thành công! <a href="baiviet">Nhấn vào đây để quay lại</a>'.$id;
           $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

  

   function del()
   {
       $id = $_REQUEST['id'];
       require 'layouts/header.php';
       if ($this->model->del($id)) {
           $this->view->thongbao = 'Đã xóa bản ghi! <a href="baiviet">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
       } else {
           $this->view->thongbao = 'Có lỗi khi xóa bản ghi này! <a href="data">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
       }
       require 'layouts/footer.php';
   }
}
?>
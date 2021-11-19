<?php
class sanpham extends controller
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
        // $this->view->data    = $this->model->getFetObj();
        $this->view->render('sanpham/index');
        require 'layouts/footer.php';
    }

    function getdata()
    {
        $keyword = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $keyword = utf8_decode($keyword);
        $offset = $_REQUEST['start'];
        $rows = $_REQUEST['length'];
        $result = $this->model->getdata($keyword, $offset, $rows);
        $totalData = $result['total'];
        $totalFilter = $totalData;
        $data = array();
        $i=0;
        foreach ($result['rows'] as $key => $item) {
            $subdata = array();
            $subdata[] = $item['id'];
            $subdata[] = $item['name'];
            $subdata[] = $item['danhmuc'];
            $subdata[] =  '<img src="'.$item['hinhanh'].'" height="60">';
            $subdata[] =  $item['ngaydang'];
            $subdata[] =  ($item['status'] == 1)?'<span class="text-success">Hiển thị</span>':'<span class="text-secondary">Ẩn</span>';
            $subdata[] = '<a href="sanpham/edit?id='.$item['id'].'" ><i class="fa fa-edit"></i></a>';
            $subdata[] ='<a href="javascript:void(0)" onclick="del('.$item['id'].')"><i class="fa fa-trash-o"></i></a>';
            $data[] = $subdata;
            $i++;
        }
        $json_data = array(
            "draw" => intval($_REQUEST['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFilter),
            "data" => $data
        );
        echo json_encode($json_data);
    }


    public function saveimage(){
        $id=$_REQUEST['post_id'];
        $number=$_REQUEST['imageNumber'];
            if (isset($_FILES['image']['name']) && ($_FILES['image']['name']!='')) {
              $dir = ROOT_DIR.'/uploads/sanpham/';  
              $file = functions::uploadfile('image',$dir,$_FILES['image']['name']);
              $hinhanh =HOME.'/uploads/sanpham/'.$file;
            }else{
              $hinhanh = 'http://via.placeholder.com/360x225';
            }
       $data=['link'=>$hinhanh,'position'=>$number,'product'=>$id,'status'=>0];
       $ok=$this->model->saveanh($data);
       echo $ok;
    }

     public function saveimageedit(){
        $id=$_REQUEST['post_id'];
        $number=$_REQUEST['imageNumber'];
            if (isset($_FILES['image']['name']) && ($_FILES['image']['name']!='')) {
              $dir = ROOT_DIR.'/uploads/sanpham/';  
              $file = functions::uploadfile('image',$dir,$_FILES['image']['name']);
              $hinhanh =HOME.'/uploads/sanpham/'.$file;
            }else{
              $hinhanh = 'http://via.placeholder.com/360x225';
            }
       $data=['link'=>$hinhanh,'position'=>$number,'product'=>$id,'status'=>1];
       $ok=$this->model->saveanh($data);
       echo $ok;
    }

    public function saveImageOrder(){
        $imageIdOrder = explode(',', $_REQUEST['imageIdOrder']);
        $this->model->updateanh($imageIdOrder);

    }

    function deleteimage(){
        $id=$_REQUEST['imageId'];
        $ok=$this->model->deleteanh($id);
        $dem= strlen(HOME);
        $link= substr($ok['link'],$dem);
        unlink(ROOT_DIR.$link);
    }

    function xoa()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->model->delObj($id);
        echo "<script>window.location.assign('".CMS."/sanpham');</script>";
    }

    function edit()
    {
        require 'layouts/header.php';
        $id                      = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $this->view->data        = $this->model->getrow($id);
        $this->view->danhmuc     = $this->model->getcate();
         $this->view->thuoctinh     = $this->model->getthuoctinh();
          $this->view->thuoctinhvalue     = $this->model->getthuoctinhdetail($id);
        $this->view->hinhanh=$this->model->gethinhanh($id);
        $this->view->render('sanpham/edit');
        require 'layouts/footer.php';
    }

    function editsave()
    {
        $id      = $_REQUEST['id'];
        $name    = $_REQUEST['name'];
        $status    = $_REQUEST['status'];
      $ma    = $_REQUEST['ma'];
      if ($_REQUEST['url']=='')
         $url     = functions::convertname($name);
      else
         $url = $_REQUEST['url'];
      
      $danhmuc = $_REQUEST['danh_muc'];
      $tag = $_REQUEST['tag'];
      $mota    = $_REQUEST['mo_ta'];
      $noidung    = $_REQUEST['noidung'];
      $position    = $_REQUEST['position'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'name' => $name,
                  'url' => $url,
                  'code' => $ma,
                  'content' => $noidung,
                  'description' => $mota,
                  'category' => $danhmuc,
                  'tag' => $tag,
                  'author'=>$_SESSION['admin']['id'],
                  'position'=>$position,
                  'status'=>$status,
                  'updated' => $ngaydang
      );
      $ok= $this->model->updateObj($id,$data);

      $tongtt    = $_REQUEST['tongtt'];
      $this->model->deletett($id);
      for ($j=1; $j <=$tongtt ; $j++) { 
          $data2=[];
          $value = $_REQUEST['thuoctinh'.$j];
          $data2=['product'=>$id,'value'=>$value,'status'=>1];
          $this->model->updatett($data2);
      }

       require 'layouts/header.php';
        if ($ok){
            $this->view->thongbao = 'Cập nhật thành công! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
        }
        else{
             $this->view->thongbao = 'Cập nhật không thành công! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }

    function add()
    {
        require 'layouts/header.php';
        $this->view->danhmuc     = $this->model->getcate();
        $this->view->masp     = functions::password_generate(6);
        $this->view->thuoctinh     = $this->model->getthuoctinh();
        $this->view->render('sanpham/add');
        require 'layouts/footer.php';
    }

    function addsave()
    {
      $name    = $_REQUEST['name'];
      $status    = $_REQUEST['status'];
      $ma    = $_REQUEST['ma'];
      $masp    = $_REQUEST['masp'];
      if ($_REQUEST['url']=='')
         $url     = functions::convertname($name);
      else
         $url = $_REQUEST['url'];
      
      $danhmuc = $_REQUEST['danh_muc'];
      $tag = $_REQUEST['tag'];
      $mota    = $_REQUEST['mo_ta'];
      $noidung    = $_REQUEST['noidung'];
      $ngaydang= date("Y-m-d");
      $data = array(
                  'name' => $name,
                  'url' => $url,
                  'code' => $ma,
                  'content' => $noidung,
                  'description' => $mota,
                  'category' => $danhmuc,
                  'tag' => $tag,
                  'author'=>$_SESSION['admin']['id'],
                  'status'=>$status,
                  'updated' => $ngaydang
      );
      $idsp= $this->model->addObj($data);
      $hinhanh=['product'=>$idsp,'status'=>1];
      $this->model->updatehinhanh($hinhanh,$masp);

      $tongtt    = $_REQUEST['tongtt'];
      for ($j=1; $j <=$tongtt ; $j++) { 
          $data2=[];
          $value = $_REQUEST['thuoctinh'.$j];
          $data2=['product'=>$idsp,'value'=>$value,'status'=>1];
          $this->model->addtt($data2);
      }

       require 'layouts/header.php';
        if ($idsp){
            $this->view->thongbao = 'Cập nhật thành công! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('thongbao');
        }
        else{
             $this->view->thongbao = 'Cập nhật không thành công! <a href="sanpham">Nhấn vào đây để quay lại</a>';
           $this->view->render('canhbao');
        }
        require 'layouts/footer.php';
    }
}
?>

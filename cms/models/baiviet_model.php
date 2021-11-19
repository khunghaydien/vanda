<?php
class baiviet_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 ";
        $query           = $this->db->query("SELECT *,
            CONCAT('<img src=\"',hinh_anh,'\" height=\"50\">') AS hinhanh,
            (SELECT name FROM danhmuc WHERE id=danh_muc) AS danhmuc
            FROM baiviet $dieukien ORDER BY id DESC ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getdata2($keyword, $offset, $rows)
    {
       
           
        $result = array();
        $dieukien = " WHERE status=1 ";
        if ($keyword != '')
            $dieukien .= " AND (id Like '%" . $keyword . "%' 
            OR title Like '%" . $keyword . "%' 
            OR updated Like '%" . $keyword . "%' ) ";
        if ($_SESSION['admin']['nhom'] > 2)
            $dieukien .= " AND author = '".$_SESSION['admin']['id']."'";
        $query = $this->db->query("SELECT count(1) AS total
            FROM blog a $dieukien ");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        $result['total'] = $row[0]['total'];
        $result['rows'] = array();
        $query = $this->db->query("SELECT *,
            (SELECT name FROM blogcategory WHERE id=a.category) AS category,
            (SELECT name FROM admin WHERE id=a.author) AS nhanvien,
            DATE_FORMAT(updated,'%d/%m/%Y') AS updated
            FROM blog a $dieukien ORDER BY id DESC LIMIT  $offset ,$rows ");
        $result['rows'] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function danhmuc()
    {
        $result   = array();
        $dieukien = " WHERE status=1 ";
        $query           = $this->db->query("SELECT id,name FROM blogcategory $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE status=1 AND id='$id' ";
        $query           = $this->db->query("SELECT * FROM blog $dieukien ");
        if ($query){
          $result  = $query->fetchAll(PDO::FETCH_ASSOC);
          return $result[0];
        }
        else
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE status=1 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM blog $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.a';
        if($id>0)
            $query = $this->update("blog", $data, " id = $id ");
        else {
            $data['status']=1;
            $data['updated']=date("Y-m-d");
            $data['author']=$_SESSION['admin']['id'];
            $query = $this->insert("blog", $data);
        }
        return $query;
    }

    function del($id)
    {
        $data=['status'=>0];
        $dieukien = " id = ".$id."";
        if ($_SESSION['admin']['nhom'] > 2){
            $dieukien .= " AND author = '".$_SESSION['admin']['id']."'";
        }
        $query = $this->update("blog", $data, $dieukien);
        return $query;
    }

}

?>

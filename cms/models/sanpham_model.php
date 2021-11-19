<?php
class sanpham_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }
   function getFetObj()
   {
       $query = $this->db->query("SELECT *
          FROM product WHERE status>0 ORDER BY id DESC ");
        return  $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function getdata($keyword, $offset, $rows)
    {
        $result   = array();
        $dieukien = " WHERE status>0 ";
        if ($keyword!='') {
            $dieukien.=" AND (name LIKE '%$keyword%' OR description LIKE '%$keyword%') ";
        }
        $query = $this->db->query("SELECT count(id) AS total FROM product  $dieukien ");
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        $result['total'] = $row[0]['total'];
        $result['rows'] = array();
        $query           = $this->db->query("SELECT *,
            (SELECT name FROM admin WHERE id=author) AS nhanvien,
            (SELECT link FROM productpicture WHERE product=a.id ORDER BY position ASC LIMIT 1) AS hinhanh,
            (SELECT name FROM productcategory WHERE id=category) AS danhmuc,
            DATE_FORMAT(updated,'%d/%m/%Y') AS ngaydang
            FROM product a $dieukien ORDER BY status, id DESC LIMIT  $offset ,$rows ");
        if ($query)
            $result['rows']  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM product WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }

   function gethinhanh($id)
   {
       $query = $this->db->query("SELECT * ,
        (SELECT max(position) FROM productpicture WHERE product=$id ) AS total 
        FROM productpicture WHERE product=$id AND status=1 ORDER BY position ASC ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function getthuoctinhdetail($id)
   {
       $query = $this->db->query("SELECT * FROM properties_detail WHERE product=$id AND status=1 ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }


   function getcate()
   {
       $query = $this->db->query("SELECT * FROM productcategory WHERE status>0 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function getthuoctinh()
   {
       $query = $this->db->query("SELECT * FROM properties WHERE status=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }


   function danhmuc()
   {
       $query = $this->db->query("SELECT id, name FROM " . danhmuc . " WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function addObj($data)
   {
       $query = $this->insert("product", $data);
       $ok= $this->db->lastInsertId();

       return $ok;
   }

   function addtt($data2)
   {
       $query = $this->insert("properties_detail", $data2);
       return $query;
   }

   function saveanh($data)
   {
       $query = $this->insert("productpicture", $data);
       $ok= $this->db->lastInsertId();
       return $ok;
   }

   function updateanh($imageIdOrder)
   {
        for ($i=0; $i < count($imageIdOrder) ; $i++) {
            $data=['position'=>($i+1)];
            $query=$this->update("productpicture",$data," id=$imageIdOrder[$i] ");
        }
       return $query;
   }

   function deleteanh($id)
   {
       $query = $this->db->query(" SELECT link FROM productpicture  WHERE id=$id ");
       $temp= $query->fetchAll(PDO::FETCH_ASSOC);
       $query1=$this->delete("productpicture","id = $id");
       return $temp[0];
   }

   function updateObj($id, $data)
   {
       $query=$this->update("product", $data, "id = $id");
       return $query;
   }

   function updatett($data2)
   {
        
        $query = $this->insert("properties_detail", $data2);
       return $query;
   }

   function deletett($id){
       $query=$this->delete("properties_detail","product = $id");
       return $query;
   }

   function updatehinhanh($hinhanh,$masp)
   {
       $query=$this->update("productpicture", $hinhanh, "product = $masp");
       return $query;
   }

   function delObj($id)
   {
       $data= ['status'=>0];
       $query=$this->update("product", $data, "id = $id");
       return $query;
   }
}
?>

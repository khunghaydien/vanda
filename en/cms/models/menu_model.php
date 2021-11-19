<?php
class menu_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE status=1 ";
        $query           = $this->db->query("SELECT * FROM menu $dieukien ");
        if ($query)
            $result=functions::dequy($query->fetchAll(PDO::FETCH_ASSOC),0,0);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE status=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM menu $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("menu", $data, "id = $id");
        else {
            $data['status']=1;
            $query = $this->insert("menu", $data);
        }
        return $query;
    }

    function baiviet()
    {
        $result   = array();
        $query           = $this->db->query("SELECT url,title AS name FROM blog WHERE status=1 ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function danhmuc()
    {
        $result   = array();
        $query           = $this->db->query("SELECT url,name FROM blogcategory WHERE status=1 ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function sanpham()
    {
        $result   = array();
        $query           = $this->db->query("SELECT url,name FROM product WHERE status=1 ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function loaisanpham()
    {
        $result   = array();
        $query           = $this->db->query("SELECT url,name FROM productcategory WHERE status=1 ");
        $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE menu SET tinh_trang=0 WHERE id=$id ");
        return $query;
    }
}

?>

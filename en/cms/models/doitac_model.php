<?php
class doitac_model extends model
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
            CONCAT('<img src=\"',hinh_anh,'\" height=\"50\">') AS hinhanh
            FROM doitac $dieukien ORDER BY id DESC ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM doitac $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("doitac", $data, "id = $id");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("doitac", $data);
        }
        return $query;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE doitac SET tinh_trang=0 WHERE id=$id ");
        return $query;
    }
    function hienthi($id)
    {
        $query = $this->db->query("UPDATE doitac SET hien_thi= NOT hien_thi WHERE id=$id ");
        return $query;
    }

}

?>

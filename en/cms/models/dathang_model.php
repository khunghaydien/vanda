<?php
class dathang_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE status>0 ";
        $query = $this->db->query("SELECT *,
        (SELECT name FROM product WHERE id = id_product) as name_product,
        (SELECT code FROM product WHERE id = id_product) as code_product,
        (SELECT url FROM product WHERE id = id_product) as url_product
         FROM booking $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("booking", $data, " id = $id ");
        else {
            $data['status']=1;
            $query = $this->insert("booking", $data);
        }
        return $query;
    }
    function del($id)
    {
        $query = $this->db->query("UPDATE booking SET status=0 WHERE id=$id ");
        return $query;
    }
}

?>

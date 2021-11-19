<?php
class booking_model extends model
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
            DATE_FORMAT(thoi_gian,'%d/%m/%Y %H:%i:%s') AS thoigian
           FROM booking $dieukien ORDER BY id DESC ");
        if ($query) 
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $query = $this->update("booking", $data, " id = $id ");
        return $query;
    }
}

?>

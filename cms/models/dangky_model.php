<?php
class dangky_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE status=1 ";
        $query           = $this->db->query("SELECT *,
            DATE_FORMAT(date,'%d/%m/%Y %H:%i:%s') AS thoigian
           FROM contact $dieukien ORDER BY id DESC ");
        if ($query) 
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $query = $this->update("lienhe", $data, " id = $id ");
        return $query;
    }
}

?>

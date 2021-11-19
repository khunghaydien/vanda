<?php
class banner_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE status=1 ";
        $query           = $this->db->query("SELECT *
           FROM banner $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("banner", $data, " id = $id ");
        else {
            $data['status']=1;
            $query = $this->insert("banner", $data);
        }
        return $query;
    }
    function del($id)
    {
        $query = $this->db->query("UPDATE banner SET status=0 WHERE id=$id ");
        return $query;
    }
}

?>

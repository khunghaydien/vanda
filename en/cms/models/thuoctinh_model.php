<?php
class thuoctinh_model extends model
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
           FROM properties $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        if($id>0)
            $query = $this->update("properties", $data, " id = $id ");
        else {
            $data['status']=1;
            $query = $this->insert("properties", $data);
        }
        return $query;
    }

    function del($id)
    {
        $data=['status'=>0];
        $query = $this->update("properties", $data, " id = $id ");
        return $query;
    }
}

?>

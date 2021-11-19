<?php
class users_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id>1 ";
        $query           = $this->db->query("SELECT *
            FROM admin $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE tinh_trang=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM admin $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function saverow($id, $data)
    {
        if($id>0)
            $query = $this->update("admin", $data, "id = $id");
        else {
            $data['tinh_trang']=1;
            $query = $this->insert("admin", $data);
        }
        return $query;
    }

}

?>

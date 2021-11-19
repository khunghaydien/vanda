<?php
class danhmuc_model extends model
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
            CONCAT('<img src=\"',image,'\" height=\"50\">') AS hinhanh
            FROM blogcategory $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE status=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM blogcategory $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE status=1 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM blogcategory $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.a';
        if($id>0)
            $query = $this->update("blogcategory", $data, "id = $id");
        else {
            $data['status']=1;
            $query = $this->insert("blogcategory", $data);
        }
        return $query;
    }

    function del($id)
    {
        $query = $this->db->query("UPDATE blogcategory SET status=0 WHERE id=$id ");
        return $query;
    }

}

?>

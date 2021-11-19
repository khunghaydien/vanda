<?php
class danhmucsp_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getdata()
    {
        $result   = array();
        $dieukien = " WHERE status>0 ";
        $query           = $this->db->query("SELECT *,
            CONCAT('<img src=\"',image,'\" height=\"50\">') AS hinhanh,
            IF(a.cha>0,(SELECT name from productcategory WHERE id= a.cha),'') AS muccha
            FROM productcategory a $dieukien ORDER BY cha ASC, position ASC, name ASC");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getrow($id)
    {
        $result   = array();
        $dieukien = " WHERE status=1 AND id=$id ";
        $query           = $this->db->query("SELECT * FROM data $dieukien ");
        if ($query)
            $result  = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function save($id, $data)
    {
        $url = $data['url'];
        $dieukien = " WHERE status>0 AND url LIKE '$url%' AND id!=$id ";
        $query  = $this->db->query("SELECT url FROM productcategory $dieukien ORDER BY url DESC LIMIT 1 ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        if (isset($temp[0]['url']))
            $data['url']=$temp[0]['url'].'.x';
        if($id>0)
            $query = $this->update("productcategory", $data, "id = $id");
        else {
            $query = $this->insert("productcategory", $data);
        }
        return $query;
    }

     function del($id, $data)
    {
        $query = $this->update("productcategory", $data, "id = $id");
        return $query;
    }

}

?>

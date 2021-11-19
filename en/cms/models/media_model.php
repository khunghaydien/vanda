<?php
class media_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function getFetObj()
   {
       $dieukien = " WHERE 1 ";
       $query = $this->db->query("SELECT *
          FROM media $dieukien ORDER BY id DESC ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function delObj($id)
   {
       $query=$this->delete("media","id = $id");
       return $query;
   }


    function save($data)
    {
        $query = $this->insert("media", $data);
        return $query;
    }

}

?>

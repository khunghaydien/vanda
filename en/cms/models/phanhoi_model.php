<?php
class phanhoi_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }

   function getFetObj()
   {
       $dieukien = ' WHERE status=1 ';
       $query = $this->db->query("SELECT * FROM testimonials  $dieukien ORDER BY id DESC ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM testimonials  WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }

   function saverow($id, $data)
    {
        if($id>0)
            $query = $this->update("testimonials", $data, " id = $id ");
        else
            $query = $this->insert("testimonials", $data);
        return $query;
    }

   function delObj($id)
   {
       $query = $this->delete("testimonials", "id=$id");
       return $query;
   }

}
?>

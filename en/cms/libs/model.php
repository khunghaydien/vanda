<?php
class model
{
   function __construct()
   {
       $this->db = new database();
   }
   // các hàm thao tác trên database
   function insert($table, $array)
   {
       $cols = array();
       $bind = array();
       foreach ($array as $key => $value) {
           $cols[] = $key;
            $value= addslashes($value);
           $bind[] = "'" . $value . "'";
       }
       $query = $this->db->query("INSERT IGNORE INTO " . $table . " (" . implode(",", $cols) . ") VALUES (" . implode(",", $bind) . ")");
       return $query;
   }

   function update($table, $array, $where)
   {
       $set = array();
       foreach ($array as $key => $value) {
           $value= addslashes($value);
           $set[] = $key . " = '" . $value . "'";
       }
       $query = $this->db->query("UPDATE IGNORE " . $table . " SET " . implode(",", $set) . " WHERE " . $where);
       return $query;
   }

   function delete($table, $where = '')
   {
       if ($where == '') {
           $query = $this->db->query("DELETE FROM " . $table);
       } else {
           $query = $this->db->query("DELETE FROM " . $table . " WHERE " . $where);
       }
       return $query;
   }

   //  Các hàm dùng chung

   function password_generate($chars)
   {
       $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
       return substr(str_shuffle($data), 0, $chars);
   }

   function thanhpho()
   {
       $query = $this->db->query("SELECT * FROM thanhpho WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function quanhuyen($id)
   {
       $query = $this->db->query("SELECT * FROM quanhuyen WHERE tinh_trang=1 AND thanh_pho=$id ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }
}
?>

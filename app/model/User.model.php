<?php

class User
{
    private $table = "usuarios";
    private $db;

    public function __construct()
    {
        $this->db = new medoo();
    }
   public function chk_user($n,$k)
   {
       $id = $this->db->get($this->table,'id',[
           "AND" => [
               "usu_email"=>$n,
               "usu_password"=>$k,
               "usu_visible"=>1
           ]
       ]);
      return $id;

   }
   public function getUser($id)
   {
       $data = $this->db->get($this->table,"usu_nombre",["id"=>$id]);
       return $data;
   }
}







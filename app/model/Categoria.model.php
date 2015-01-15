<?php

class Categoria
{
    private $table = "categorias";
    private $db;

    public function __construct()
    {
        $this->db = new medoo();
    }

   public function getAll()
   {
       $data = $this->db->select($this->table,"*");
       return $data;
   }

 public function getName($id)
   {
       $data = $this->db->get($this->table,"cat_nombre",["id"=>$id]);
       return $data;
   }   



}







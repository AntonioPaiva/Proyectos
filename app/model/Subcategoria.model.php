<?php

class Subcategoria
{
    private $table = "sub_categorias";
    private $db;

    public function __construct()
    {
        $this->db = new medoo();
    }

   public function getAll($id)
   {
       $data = $this->db->select($this->table,"*",["AND"=>["id"=>$id,"subcat_visible"=>1]]);
       return $data;
   }

  public function getName($id)
   {
       $data = $this->db->get($this->table, "subcat_nombre",["id"=>$id]);
       return $data;
   }   


}
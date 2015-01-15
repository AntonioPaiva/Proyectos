<?php

class Ciudad
{
    private $table = "ciudades";
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



}







<?php

class Producto
{
    private $table = "productos";
    private $db;

    public function __construct()
    {
        $this->db = new medoo();
    }
   public function add($data)
   {
        $id = $this->db->insert($this->table,[
            'cliente_id'=>$data['cli_id'],
            'prod_precio'=>$data['prod_precio'],
            'ciudad_id'=>$data['ciudad_id'],
            'prod_zona'=>$data['prod_zona'],
            'prod_nombre'=>$data['prod_nombre'],
            'sub_categoria_id'=>$data['subcategoria_id'],
            'prod_descripcion_corta'=>$data['prod_descripcion_corta'],
            'prod_descripcion_larga'=>$data['prod_descripcion_larga'],
            'oferente_id'=>$data['oferente_id']
        ]);
       return $id;
       //return $this->db->error();
   }
   public function getAll($v = 99)
   {
       if($v == 0 || $v == 1)
       {
           $data = $this->db->select($this->table,"*",['prod_visible'=>$v]);
       }
       else
       {
           $data = $this->db->select($this->table,"*");
       }
       return $data;
   }
    public function getByData($data)
    {
        $data = $this->db->select($this->table,"*",[$data]);
        return $data;
    }
    //Retorna el nombre del producto por su id
    public function getName($id)
    {
        $data = $this->db->get($this->table,"prod_nombre",["id"=>$id]);
        return $data;
    }
    public function delete($id)
    {
        $r = $this->db->update($this->table,["prod_visible"=>0],["id"=>$id]);
        if($r)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}







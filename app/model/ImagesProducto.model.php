<?php

class ImagesProducto
{
    private $table = "productos_imagenes";
    private $db;

    public function __construct()
    {
        $this->db = new medoo();
    }
   public function add($id_producto, $imagen)
   {
        $id = $this->db->insert($this->table,[
            'producto_id'=>$id_producto,
            'image_path'=>$imagen
        ]);
       return $id;
       //return $this->db->error();
   }
   public function getAll($id)
   {
       $data = $this->db->select($this->table,"*",[
           "AND"=>
               ['producto_id'=>$id,'image_visible'=>1]
       ]);
       return $data;
   }

    public function delete($id)
    {
        $r = $this->db->update($this->table,["image_visible"=>0],["id"=>$id]);
        if($r)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getCantidad($id)
    {
        $data = $this->db->count($this->table,"*",[
            "AND"=>
                ['producto_id'=>$id,'image_visible'=>1]
        ]);
        return $data;
    }

    public function getImg($id)
    {
        $data = $this->db->get($this->table,"image_path",["id"=>$id]);
       return $data;
    }

}
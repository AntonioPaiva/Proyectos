<?php
require("../../app/db.php");

if(!empty($_POST['id']))
{
  $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $sco = new Subcategoria();
    $sc = $sco->getAll($id);
    $data='<option value="">Seleccione</option>';
    for($i=0;$i < count($sc);$i++)
    {
        $data.='<option value="'.$sc[$i]['id'].'">'.$sc[$i]['subcat_nombre'].'</option>';
    }
}   echo $data;

?>
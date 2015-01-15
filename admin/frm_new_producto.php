<?php require_once("chk_session.php");
$ciudad = new Ciudad();
$cd = $ciudad->getAll();
$prod = new Producto();

$categoria = new Categoria();
$cat = $categoria->getAll();



?>

<div class="row">
    <div class="col-lg-12">
        <h1>Productos. <small>Cargar nuevo producto.</small></h1>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-4 alert alert-info">
            <span class="badge">1</span> Datos del producto

        </div>
        <div class="col-md-4 alert alert-dismissable"><span class="badge">2</span> Imágenes del producto</div>
        <div class="col-md-4 alert alert-dismissable"><span class="badge">3</span> Publicar</div>
    </div>

    <form data-role="form" class="form-horizontal" id="frm_new_prod" method="post" action="">
        <fieldset>
            <legend>Agregar nuevo producto</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="nombre">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                    <input type="hidden" name="cliID" value="<?= $_SESSION['cliId']?>">

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="precio">Precio</label>
                <div class="col-sm-10">
                    <input type="text" id="precio" name="precio" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ciudad">Ciudad</label>
                <div class="col-sm-10">
                    <select id="ciudad" name="ciudad" class="form-control">
                        <option value="">Seleccione</option>
                        <?php foreach($cd as $cdn){?>
                            <option value="<?=$cdn['id']?>"><?=$cdn['ciudad_nombre']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="zona">Zona</label>
                <div class="col-sm-10">
                    <input type="text" id="zona" name="zona" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="cat">Categoria</label>
                <div class="col-sm-10">
                    <select id="cat" name="cat" class="form-control">
                        <option>Seleccione</option>
                        <?php foreach($cat as $catt){?>
                            <option value="<?=$catt['id']?>"><?=$catt['cat_nombre']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="subH">
                <label class="col-sm-2 control-label" for="subcat">Subcategoría</label>
                <div class="col-sm-10">
                    <select id="subcat" name="subcat" class="form-control">
                        <option value="1">Valor 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="desc">Descripción corta</label>
                <div class="col-sm-10">
                    <textarea id="desc" name="desc" class="form-control" required>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="desl">Descripción larga</label>
                <div class="col-sm-10">
                    <textarea id="desl" name="desl" class="form-control" required>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="ofer">Ofertar como</label>
                <div class="col-sm-10">
                    <input type="radio" id="ofer1" value="1" name="ofer" class=""> Comerciante
                    <input type="radio" id="ofer2" value="2" name="ofer" class=""> Particular
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" id="btn_env" class="btn btn-primary" value="Guardar">
                </div>
            </div>


        </fieldset>
    </form>

    <script>
        $(document).ready(function(){


        $("#cat").change(function(){
            $("#cat option:selected").each(function(){
                var cat = $(this).val();
                $.post("ajax/loadSubcategoria.php",{id:cat},
                    function(data){
                        if(data)
                        {
                            $("#subH").show("slow");
                            $("#subcat").html(data);

                        }
                        else
                        {
                            $("#subcat").html('<option value="">No hay SubCategoría</option>');
                        }
                    });
            });
        });
    });

    </script>
<?php
if(!empty($_POST['desc']))
{
    $data = array(
        'cli_id'=>$_POST['cliID'],
        'prod_precio'=>$_POST['precio'],
        'ciudad_id'=>$_POST['ciudad'],
        'prod_zona'=>$_POST['zona'],
        'prod_nombre'=>$_POST['nombre'],
        'subcategoria_id'=>$_POST['subcat'],
        'prod_descripcion_corta'=>$_POST['desc'],
        'prod_descripcion_larga'=>$_POST['desl'],
        'oferente_id'=>$_POST['ofer']
    );
    $d = $prod->add($data);
    if($d)
    {
        $_SESSION['usu']['prodId']=$d;
        echo "<script>location.href='?frm=frm_image';</script>";
    }
    else
    {
        echo "<script>swl('Error')</script>";
    }
}

?>
</div>

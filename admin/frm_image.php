<?php
require_once("chk_session.php");
$im = new ImagesProducto();
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Imágenes. <small>Cargar imágenes.</small></h1>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-md-4 alert alert-success">
            <span class="badge">1</span> Datos del producto
            <span class="glyphicon glyphicon-ok"></span>
        </div>
        <div class="col-md-4 alert alert-info"><span class="badge">2</span> Imágenes del producto</div>
        <div class="col-md-4 alert alert-dismissable"><span class="badge">3</span> Publicar</div>
    </div>

    <form data-role="form" class="form-horizontal" id="frm_new_prod" method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Agregar nuevo imagen</legend>
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Puede subir hasta 6 imágenes.
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="nombre">Imagen</label>
                <div class="col-sm-10">
                    <input type="file" id="imagen" name="imagen" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" id="btn_env" class="btn btn-primary" value="Guardar">
                    <?php //if() ?>
                </div>
            </div>
        </fieldset>
    </form>

    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Mensaje</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


<?php

if(!empty($_FILES['imagen']['tmp_name']))
{
    include("inc/seg.php");
    include("inc/subirImagen.php");
    $newName = str_replace(" ","-",$prod->getName($_SESSION['usu']['prodId']));
    $newName = sanear_string($newName)."_".md5(date("H:m:s"));
    $carpeta_img = "productos/".$_SESSION['cliId']."/".$_SESSION['usu']['prodId']."/";
    if(!is_dir("../".$carpeta_img))
    {
        mkdir("../".$carpeta_img,0777,true);
    }
    $img = subirImagen(600,500,$carpeta_img,"imagen",$newName);
    if($img === 0)
    {
        echo "<script>
        $('#myModal').modal();
        $('.modal-body').text('El tamaño supera el valor permitido.');
        </script>";
    }
    else if($img === 1)
    {
        echo "<script>
        $('#myModal').modal();
        $('.modal-body').text('El tipo de archivo no es válido.');
        </script>";
    }
    else if($img === 3)
    {
        echo "<script>
        $('#myModal').modal();
        $('.modal-content').text('Ha ocurrido un error.');
        </script>";
    }
    else if(is_string($img)) //Se guardó correctamente la imagen
    {

        if($im->add($_SESSION['usu']['prodId'],$carpeta_img."/".$img))
        {
            echo 
            "<script>
            $('#myModal').modal();
            $('.modal-content').text('La imagen se guardó correctamente. Puedes agregar más imágenes.');
            </script>";
        }


    }



}

?>

    <div class="imagenes_productos">

        <?php
        $imagenes = $im->getAll($_SESSION['usu']['prodId']);

        foreach($imagenes as $imp)
        {?>
            <div class="pic-prev">
                <div class="pic-opc">
                        <div class="btn btn-close" data-target="<?=$imp['id']?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </div>
                </div>
                <img src='../<?=$imp['image_path']?>' width='190' id='<?=$imp['id']?>'>
            </div>
      <?php }
        ?>

    </div>
</div>
<script>
    $(".btn-close").click(function(){
        var imgID = $(this).attr("data-target");
        $.ajax({});
        $(this).parents(".pic-prev").remove();
        console.log("La imagen a eliminar es: "+imgID);
    });
</script>
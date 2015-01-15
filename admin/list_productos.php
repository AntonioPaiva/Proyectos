<?php 
require_once('../app/db.php');
include_once("chk_session.php");
$c = new Categoria();
$sc = new Subcategoria();
$img = new ImagesProducto();
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Productos. <small>Tabla de productos</small></h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><span class="fa fa-dashboard"></span> Dashboard</a></li>
            <li class="active"><span class="fa fa-table"></span> Productos->Tabla de productos</li>
        </ol>
    </div>

</div><!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <h2>Productos</h2>
        <div class="table-responsive">
            <?php
            $results = $prod->getAll();
            ?>
            <table class="table" id="lista">
                <thead>
                <tr>
                    <th>Nombre <span class="fa fa-sort"></span></th>
                    <th>Precio <span class="fa fa-sort"></span></th>
                    <th>Categoría <span class="fa fa-sort"></span></th>
                    <th>Sub Categoría <span class="fa fa-sort"></span></th>
                    <th>Imagen <span class="fa fa-sort"></span></th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                for($i=0;$i<count($results);$i++){?>
                    <tr id="item_p<?= $results[$i]['id'] ?>">
                        <td><?= $results[$i]['prod_nombre'] ?></td>
                        <td><?= $results[$i]['prod_precio'] ?></td>
                        <td><?php echo $c->getName($results[$i]); ?></td>
                        <td><?php echo $sc->getName($results[$i]); ?></td>
                        <td><?php echo "<img src='../".$img->getImg($results[$i])."' width='30'>";?></td>
                        <td>    <a class="btn btn-xs btn-warning">
                                <span class="fa fa-pencil"></span> Edit</a>
                                <a class="btn btn-xs btn-danger">
                                <span class="fa fa-pencil"></span> Delete</a>
                        </td>
                    </tr>
                <?php }  ?>

                </tbody>
            </table>
        </div>

    </div>
</div><!-- /.row -->
<script type="text/javascript" charset="utf-8">
    jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
        return ((x < y) ? -1 : ((x > y) ?  1 : 0));
    };
    jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
        return ((x < y) ?  1 : ((x > y) ? -1 : 0));
    };
    $(document).ready(function(){
        $('#lista').dataTable({
            "aaSorting": [ [0,'asc'], [1,'asc'] ],
            "aoColumnDefs": [
                { "sType": 'string-case', "aTargets": [ 2 ] }
            ]
        });
    } );
</script>
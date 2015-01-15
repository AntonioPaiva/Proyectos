<?php require_once('../app/db.php');
require_once("chk_session.php");
$usu = new User();
$prod = new Producto();

error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panel de administración">
    <meta name="author" content="Bernard">

    <title>Panel de Administración- Sara Regalos</title>
<?php include("head_files.php"); ?>
  

  </head>

  <body style="background-color: #DFDDDD">

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include("nav.php");?>

      <div id="page-wrapper">
          <?php
          if(!empty($_GET['frm']))
          {
              switch($_GET['frm'])
              {
                  case 'frm_new_producto':
                      require "frm_new_producto.php";
                      break;
                  case 'frm_image':
                      require "frm_image.php";
                      break;
                  case 'list_prod':
                      require "list_productos.php";
                      break;
              }
          }
          else
          {

          }


          ?>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->



  </body>
</html>

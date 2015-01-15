<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Menú</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Panel de Administración</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="home.php"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tag"></span> Productos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="?frm=list_prod">Tabla de productos</a></li>
                  <li><a href="?frm=frm_new_producto">Agregar Nuevo Producto</a></li>
              </ul>
            </li>
            <li><a href="?frm=slider"><span class="glyphicon glyphicon-picture"></span> Slider</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?= $usu->getUser($_SESSION['cliId'])?></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php"><span class=""></span> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
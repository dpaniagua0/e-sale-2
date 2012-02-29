<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
include("../config.php");
include('../lock.php');
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="../bootstrap/css/default.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../bootstrap/img/icons/animal-monkey.png"/>
    <script type="text/javascript" src="../bootstrap/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-buttons.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-alerts.js"></script>
    <script type="text/javascript" src="../bootstrap/js/suplier.js"></script>
    <title>e-sale</title>
  </head>
  <body>
    <?php
    include("../TopBar.php");
    ?>
    <div>
      <div class="row">
        <?php include("../MenuNavegacion.php"); ?>
        <?php include("../alertaExistencia.php"); ?>
        <div class="well main-container" >
<!--          <div>
            <form class="form-search" style="text-align: center">
              <input type="text" class="input-xxlarge search-query"/>
              <button type="submit" class="btn">Buscar</button>
            </form>
          </div>-->
          <div class="btn-group nav-action">
            <a class="btn btn-primary" href="#"><i class="icon-white icon-cog"></i></a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="../proveedor/create.php"><i class="icon-plus-sign"></i>Agregar</a></li>
              <li><a id="edit-suplier-link" href="../proveedor/edit.php"><i class="icon-pencil"></i>Editar</a></li>
              <li><a id="delete-suplier-link" href="#"><i class="icon-trash"></i>Eliminar</a></li>
            </ul>
          </div>
          <div id="contenedor-tabla">
            <?php include("suplierTable.php"); ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
include("../config.php");
include('../lock.php');
$id_editar = $_GET['id_editar'];
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
    <title>e-sale</title>
  </head>
  <body>
    <script type="text/javascript">
      function insertarRuta(){
        var datos;
        datos={
          type:         "POST",
          url:          "../proveedor/update.php",
          success:      ajaxResponse,
          data:         {
            nombre : $("#nombre").val(),
            rfc : $("#rf").val(),
            telefono: $("#telefono"),
            direccion: $("#direccion"),
            email: $("#email"),
            id_editar: $("#id-editar").val()
          } 
        }
      
        $.ajax(datos);
      }
    </script>
    <?php
    include("../TopBar.php");
    ?>
    <div class="row">
      <?php include("../MenuNavegacion.php"); ?>
      <div class="well main-container">
        <?php
        if ($_SESSION['ok']) {
          echo $_SESSION['ok'];
          $_SESSION['ok'] = null;
        } else if ($_SESSION['wrong']) {
          echo $_SESSION['wrong'];
          $_SESSION['wrong'] = null;
        }
        ?>
        <div class="row show-grid">
          <?php
          $consultaSuplier = "select id_proveedor, nombre, direccion, correo_electronico,telefono, rfc from proveedor where id_proveedor=$id_editar";
          $resultSuplier = mysql_query($consultaSuplier);
          $fila = mysql_fetch_array($resultSuplier);
          $id_proveedor = $fila['id_proveedor'];
          $nomrbe = $fila['nombre'];
          $direccion = $fila['direccion'];
          $email = $fila['correo_electronico'];
          $telefono = $fila['telefono'];
          $rfc = $fila['rfc'];
          $_SESSION['id_editar'] = $id_editar;
          ?>
          <form action="../proveedor/update.php" enctype="multipart/form-data" method="POST" onsubmit="insertarRuta(); return false;">
            <div class="span12">
              <div class="row">
                <div class="span6">
                  <div class="clearfix">
                    <label for="nombre">Nombre</label>
                    <input id="id-editar" name="id-editar" class="hide" type="text" value="<?php echo $id_editar ?>"/>
                    <div class="input">
                      <input class="span5" id="nombre" name="nombre" type="text" value="<?php echo $nomrbe ?>"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="direccion">Direccion</label>
                    <div class="input">
                      <input class="span5" id="direccion" name="direccion" type="text" value="<?php echo $direccion ?>"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button id="enviar" name="enviar" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn" onclick="location.href='../proveedor/index.php'">Cancel</button>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="telefono">Telefono</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="telefono" name="telefono" size="16" type="text" value="<?php echo $telefono ?>"/>
                        <span class="add-on"><i class="icon-signal"></i></span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="email">Correo Electronico</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="email" name="email" size="20" type="text" value="<?php echo $email ?>"/>
                        <span class="add-on"><i class="icon-envelope"></i></span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="rfc">Rfc</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="rfc" name="rfc" size="16" type="text" value="<?php echo $rfc ?>"/>
                        <span class="add-on"><i class="icon-file"></i></span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

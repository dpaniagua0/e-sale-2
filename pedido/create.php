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
    <title>e-sale</title>
  </head>
  <body>
    <script type="text/javascript">
      function insertarRuta(){
        var datos;
        datos={
          type:         "POST",
          url:          "../pedido/insert.php",
          success:      ajaxResponse,
          data:         {
            unidades : $("#unidades").val(),
            precio: $("#precio"),
            id_proveedor: $("#id-proveedor"),
            producto: $("#id-producto")          
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
          <form action="../pedido/insert.php" enctype="multipart/form-data" method="POST" onsubmit="insertarRuta(); return false;">
            <div class="span12">
              <div class="row">
                <div class="span6">
                  <div class="clearfix">
                    <label class="control-label" for="id-producto">Producto</label>
                    <div class="controls">
                      <select id="id-producto" name="producto">
                        <?php $Query = mysql_query("SELECT id_producto, nombre FROM inventario");
                        while ($item = mysql_fetch_array($Query)) { ?>  
                          <option value="<?php echo $item[id_producto]; ?>"><?php echo $item[nombre]; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="unidades">Unidades</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="unidades" name="unidades" size="16" type="text"/>
                        <span class="add-on">0</span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button id="enviar" name="enviar" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn" onclick="location.href='../pedido/index.php'">Cancel</button>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="id_proveedor">Proveedor</label>
                    <div class="controls">
                      <select id="id_proveedor" name="id_proveedor">
                        <?php $Query = mysql_query("SELECT * FROM proveedor");
                        while ($suplier = mysql_fetch_array($Query)) { ?>  
                          <option value="<?php echo $suplier[id_proveedor]; ?>"><?php echo $suplier[nombre]; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="precio">Precio</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="precio" name="precio" size="16" type="text"/>
                        <span class="add-on">.00</span>
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

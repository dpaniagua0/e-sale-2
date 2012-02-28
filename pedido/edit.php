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
          <?php
          $consultaOrder = "select p.id_proveedor,p.id_producto,p.unidades, p.fecha_pedido, s.nombre as proveedor,i.nombre as producto, p.precio from pedido p
                              left join inventario i on i.id_producto = p.id_producto
                              left join proveedor s on s.id_proveedor = p.id_proveedor
                              where p.id_pedido=$id_editar";
          $resultOrder = mysql_query($consultaOrder);
          $fila = mysql_fetch_array($resultOrder);
          $id_proveedor = $fila['id_proveedor'];
          $id_producto = $fila['id_producto'];
          $proveedor = $fila['proveedor'];
          $precio = $fila['precio'];
          $fechaPedido = $fila['fecha_pedido'];
          $producto = $fila['producto'];
          $unidades = $fila['unidades'];
          $_SESSION['id_editar'] = $id_editar;
          ?>
          <form action="../pedido/update.php" enctype="multipart/form-data" method="POST" onsubmit="insertarRuta(); return false;">
            <div class="span12">
              <div class="row">
                <div class="span6">
                  <div class="clearfix">
                    <label class="control-label" for="id-producto">Producto</label>
                    <div class="controls">
                      <select id="id-producto" name="producto">
                        <option value="<?php echo $id_producto ?>"><?php echo $producto ?></option>
                        <?php $Query = mysql_query("SELECT * FROM inventario");
                        while ($product = mysql_fetch_array($Query)) { ?>  
                          <?php if ($id_producto != $product[id_producto]) { ?>
                            <option value="<?php echo $product[id_producto]; ?>"><?php echo $product[nombre]; ?> </option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="unidades">Unidades</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="unidades" name="unidades" size="16" type="text" value="<?php echo $unidades ?>"/>
                        <span class="add-on">0</span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div><div class="form-actions">
                    <button id="enviar" name="enviar" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn" onclick="location.href='../pedido/index.php'">Cancel</button>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="id_proveedor">Proveedor</label>
                    <div class="controls">
                      <select id="id_proveedor" name="id_proveedor">
                        <option value="<?php echo $id_proveedor ?>"><?php echo $proveedor ?></option>
                        <?php $Query = mysql_query("SELECT * FROM proveedor");
                        while ($suplier = mysql_fetch_array($Query)) { ?>  
                          <?php if ($id_proveedor != $suplier[id_proveedor]) { ?>
                            <option value="<?php echo $suplier[id_proveedor]; ?>"><?php echo $suplier[nombre]; ?> </option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="precio">Precio</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="precio" name="precio" size="16" type="text" value="<?php echo $precio ?>"/>
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
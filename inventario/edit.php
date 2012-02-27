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
      function modificarProducto(){
        var datos;
        datos={
          type:         "POST",
          url:          "../inventario/update.php",
          success:      ajaxResponse,
          data:         {
            nombre : $("#nombre").val(),
            precio : $("#precio").val(),
            id_categoria: $("#id_categoria"),
            id_marca: $("#id_marca"),
            existencia: $("#existencia"),
            descripccion: $("#descripccion"),
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
          $consultaInventario = "select p.id_producto, p.nombre, p.precio_venta,p.existencia, m.marca, c.categoria,c.id_categoria,m.id_marca,p.descripccion, p.existencia from inventario p
                                 left join marca m on m.id_marca = p.id_marca
                                 left join categoria c on c.id_categoria = p.id_categoria
                                 where p.id_producto = $id_editar";
          $resultInventario = mysql_query($consultaInventario);
          $fila = mysql_fetch_array($resultInventario);
          $id_producto = $fila['id_producto'];
          $nombre = $fila['nombre'];
          $categoriaNombre = $fila['categoria'];
          $precio = $fila['precio_venta'];
          $id_categoria = $fila['id_categoria'];
          $id_marca = $fila['id_marca'];
          $nombreMarca = $fila['marca'];
          $unidades = $fila['existencia'];
          $descripccion = $fila['descripccion'];
          $_SESSION['id_editar'] = $id_editar;
          ?>
          <form action="../inventario/update.php" enctype="multipart/form-data" method="POST" onsubmit="modificarProducto(); return false;">
            <div class="span12">
              <div class="row">
                <div class="span6">
                  <div class="clearfix">
                    <label for="nombre">Producto</label>
                    <input id="id-editar" name="id-editar" class="hide" type="text" value="<?php echo $id_editar ?>"/>
                    <div class="input">
                      <input class="span5" id="nombre" name="nombre" type="text" value="<?php echo $nombre ?>"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="descripccion">Descripcción</label>
                    <div class="controls">
                      <textarea class="span5 input-xlarge" id="descripccion" name="descripccion" rows="10"><?php echo $descripccion ?></textarea>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button id="enviar" name="enviar" type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn" onclick="location.href='../inventario/index.php'">Cancel</button>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="id_categoria">Categoria</label>
                    <div class="controls">
                      <select id="id_categoria" name="id_categoria">
                        <option value="<?php echo $id_categoria ?>"><?php echo $categoriaNombre ?></option>
                        <?php $Query = mysql_query("SELECT * FROM categoria");
                        while ($category = mysql_fetch_array($Query)) { ?>
                          <?php if ($id_categoria != $category[id_categotia]) { ?>
                            <option value="<?php echo $category[id_categoria]; ?>"><?php echo $category[categoria]; ?> </option>
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
                        <input class="span2" id="precio" name="precio" size="16" type="text" value="<?php echo $precio?>"/>
                        <span class="add-on">.00</span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="id_marca">Marca</label>
                    <div class="controls">
                      <select id="id_marca" name="id_marca">
                        <option value="<?php echo $id_marca?>"><?php echo $nombreMarca?></option>
                        <?php $Query = mysql_query("SELECT * FROM marca");
                        while ($brand = mysql_fetch_array($Query)) { ?>  
                        <?php if($id_marca != $brand[id_marca]) {?>
                          <option value="<?php echo $brand[id_marca]; ?>"><?php echo $brand[marca]; ?> </option>
                        <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="existencia">Unidades</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="existencia" name="existencia" size="16" type="text" value="<?php echo $unidades?>"/>
                        <span class="add-on">0</span>
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

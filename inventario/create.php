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
    <script type="text/javascript" src="../bootstrap/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-buttons.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap-alerts.js"></script>
    <title>e-sale</title>
  </head>
  <body>
    <?php
    include("../TopBar.php");
    ?>
    <div class="row">
      <?php include("../MenuNavegacion.php"); ?>
      <div class="well main-container">
        <div class="alert alert-success hidden" style="text-align: center">
          <a data-dismiss="alert" href="#" class="close">&times;</a>
          <p>El producto ha sido registrado con exito.</p> 
        </div>
        <div class="row show-grid">
          <form>
            <div class="span12">
              <div class="row">
                <div class="span6">
                  <div class="clearfix">
                    <label for="producto">Producto</label>
                    <div class="input">
                      <input class="span5" id="producto" name="producto" type="text"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="descrip">Descripcción</label>
                    <div class="controls">
                      <textarea class="span5 input-xlarge" id="descrip" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn">Cancel</button>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="select01">Categoria</label>
                    <div class="controls">
                      <select id="select01">
                        <option>something</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="precio">Precio</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="precio" size="16" type="text"/>
                        <span class="add-on">.00</span>
                      </div>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label" for="marca">Marca</label>
                    <div class="controls">
                      <select id="marca">
                        <option>something</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <span class="help-block">Requerido.</span>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="unidad">Unidades</label>
                    <div class="controls">
                      <div class="input-append">
                        <input class="span2" id="unidad" size="16" type="text"/>
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

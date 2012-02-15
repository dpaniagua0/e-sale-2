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
    <div>
      <div class="row">
        <?php include("../MenuNavegacion.php"); ?>
        <div class="well main-container" style="text-align: center;">
          <div class="alert alert-success hidden">
            <a data-dismiss="alert" href="#" class="close">&times;</a>
            <p>El producto ha sido registrado con exito.</p> 
          </div>
          <div class="row">
            <div class="span12">
              <form class="add-product">
                <div>
                  <div class="clearfix">
                    <label for="producto">Producto:</label>
                    <div class="input">
                      <input class="span5" id="producto" name="producto" type="text"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                  <div class="clearfix">
                    <label for="user_full_name">Your Full Name:</label>
                    <div class="input">
                      <input class="span5" id="user_full_name" name="user[full_name]" type="text"/>
                      <span class="help-block">Requerido.</span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

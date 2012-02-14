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
        </div>
      </div>
    </div>
  </body>
</html>

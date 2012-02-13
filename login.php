<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <?php
  include("config.php");
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = addslashes($_POST['username']);
    $mypassword = addslashes($_POST['password']);

    $sql = "SELECT u.id_usuario, u.id_perfil FROM usuario u 
  WHERE u.usuario = '$myusername' and password = '$mypassword'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    $active = $row['active'];
    $id_usuario = $row['id_usuario'];
    $perfil = $row['id_perfil'];
    $count = mysql_num_rows($result);

    if ($count == 1) {
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;
      $_SESSION['id_usuario'] = $id_usuario;
      if ($perfil == "1") {
        header("location: inicio.php");
      }
    } else {
      $error = "Usuario y/o Password incorrectos";
    }
  }
  ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="bootstrap/css/default.css" rel="stylesheet"/>
    <script type="text/javascript" src="bootstrap/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery-ui.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-buttons.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-alerts.js"></script>
    <title>e-sale</title>
  </head>
  <body>
    <div class="block">
      <div class="block-head">
        <h2>Entrar al sistema</h2>
      </div>
      <div class="block-content">
        <form action="" method="post">
          <?php
          if ($error != null) {
            echo "<div class='login-error alert alert-danger hidden'>
                    <a data-dismiss='alert' href='#' class='close'>&times;</a>
                    <strong>" . $error . "</strong>
                </div>";
          }
          ?>
          <div class="clearfix">
            <label class="user-login" for="username">Usuario</label>
            <div class="input">
              <input class="span4" id="username" name="username" type="text"/>
            </div>
          </div>
          <div class="clearfix">
            <label class="pass-login" for="password">Contraseña</label>
            <div class="input">
              <input class="span4" id="password" name="password" type="password"/>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="span6">
              <p>
                <input class="btn btn-primary btn-large" value="Entrar" type="submit"/>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

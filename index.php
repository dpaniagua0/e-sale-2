<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
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
    <title>E-sale</title>
  </head>
  <body>
    <div class="block">
      <div class="block-head">
        <h2>Entrar al sistema</h2>
      </div>
      <div class="block-content">
        <form method="post">
          <div class="login-error alert alert-danger hidden">
            <a data-dismiss="alert" class="close" onclick="" href="#">&times;</a>
            <strong>Usuario y/o Contraseña incorrestos</strong>
          </div>
          <div class="clearfix">
            <label class="user-login" for="user_login">Usuario o email</label>
            <div class="input">
              <input class="span4" id="user_login" name="user-login" type="text"/>
            </div>
          </div>
          <div class="clearfix">
            <label class="pass-login" for="user_password">Contraseña</label>
            <div class="input">
              <input class="span4" id="user_password" name="user-password" type="password"/>
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

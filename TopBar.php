<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="btn-toolbar" style="margin-top: 0px;margin-bottom: 0px;">
        <a class="brand" href="inicio.php">Bienvenido a e-sale</a>
        <div class="btn-group nav-user">
          <a class="btn" href="#"><?php echo $_SESSION['login_user']; ?></a>
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>     
      </div>
    </div>
  </div>
</div>

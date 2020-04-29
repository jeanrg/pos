
<div class="login-page">
  <div id="back"></div>
<div class="login-box">
  <div class="login-logo">
    <b class="text-success">JVNet </b>System
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar sesión</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Ingrese su usuario" autocomplete="off" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="userpass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12  mb-2">            
            <button type="submit" class="btn btn-outline-success btn-block">
              <span class="text-lg-center">Ingresar</span></button>
          </div>
          <!-- /.col -->
        </div>
        
      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>


      </form>

      <div class="row d-inline ml-auto">
      <a href="#" class="text-muted">Olvide mi contraseña</a>
      <a href="#" class="text-muted float-right">Registrarme</a> 
    </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
<!-- /.login-box -->
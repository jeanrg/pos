    <!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="inicio" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="usuarios" class="nav-link">Usuarios</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="categorias" class="nav-link">Categorias</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contacto</a>
        </li>
    </ul>

      <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


     	<!-- Messages Dropdown Menu -->
      <ul class="navbar-nav ml-auto">

	      <ul class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <?php 

                  if ($_SESSION["foto"] != "") {
                    
                      echo '<img src="'.$_SESSION["foto"].'" class="user-image img-circle elevation-2" alt="User Image">';
                  }else{
                    echo '<img src="vistas/img/usuarios/default/perfil.jpg" class="user-image img-circle elevation-2" alt="User Image">';
                  }

               ?>
                <span class="d-none d-md-inline "><?php echo $_SESSION["nombre"]; ?></span>
            </a>

                <ul class="dropdown-menu dropdown-menu-right">
                <!-- User image -->
                    <li class="card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url('vistas/img/plantilla/photo1.png') center center;">              
                            <h3 class="user-username text-right"><?php echo $_SESSION["nombre"]; ?></h3>
                            <h5 class="user-desc text-right"><?php echo $_SESSION["perfil"]; ?></h5>
                        </div>    
                        <div class="widget-user-image">
                          <?php 

                             if ($_SESSION["foto"] != "") {
                    
                                echo '<img class="img-circle" src="'.$_SESSION["foto"].'"  alt="User Image">';
                              }else{
                                echo '<img  class="img-circle" src="vistas/img/usuarios/default/perfil.jpg" alt="User Image">';
                              }
                          ?>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                  <div class="description-block">
                                      <h5 class="description-header">3,200</h5>
                                      <small class="description-text">VENTAS</small>
                                  </div>
                                  <!-- /.description-block -->
                                </div>
                        <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                      <h5 class="description-header">13,000</h5>
                                      <small class="description-text text-sm-center">PAGOS</small>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                        <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                      <h5 class="description-header">35</h5>
                                      <small class="description-text">PRODUCTOS</small>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                        <!-- /.col -->
                            </div>

                            <div class="row d-inline m-1">
                                <a href="perfil" class="link-info">
                                <span class="glyphicon glyphicon-user"></span> Perfil</a>
                                <a href="salir" class="text-danger  float-right">
                                <span class="glyphicon glyphicon-log-out"></span> Salir</a>   
                            </div>  
                        </div> 
                    </li>
                </ul> 
            </ul>   
        </ul>     
  </nav>

  <!-- /.navbar -->

  

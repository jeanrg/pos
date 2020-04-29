 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt text-muted"></i><a href="inicio" class="font-weight-bold text-secondary"> Inicio</a></li>
              <li class="breadcrumb-item active">usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">

              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  Administrar usuarios</h3>
                    <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#modalAddUser">Registrar usuario</button>
              </div>

              <div class="card-body table-responsive">             

                <table id="tbusuarios" class="table table-bordered  table-striped dt-responsive tablas">
                
                  <thead>
                      <tr>
                          <th style="width: 10px">#</th>
                          <th>Nombre</th>
                          <th>Usuario</th>
                          <th>Foto</th>
                          <th>Perfil</th>
                          <th>Estado</th>
                          <th>Ultimo ingreso</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>

                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Usuario Admin</td>
                          <td>admin</td>
                          <td class="text-center">
                              <img src="vistas/img/plantilla/user8-128x128.jpg" class="img-thumbnail" width="40px" alt="user img"></td>
                          <td>Administrador</td>
                          <td>
                              <i class="fa fa-circle text-success"></i>Activado</td>
                          <td>25-03-2020 21:45:32</td>
                          <td class="text-center">
                              <div class="btn-group">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-sync"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </div></td>
                      </tr>

                      <tr>
                          <td>1</td>
                          <td>Usuario Admin</td>
                          <td>admin</td>
                          <td class="text-center">
                              <img src="vistas/img/plantilla/user8-128x128.jpg" class="img-thumbnail" width="40px" alt="user img"></td>
                          <td>Administrador</td>
                          <td>
                              <i class="fa fa-circle text-success"></i>Activado</td>
                          <td>25-03-2020 21:45:32</td>
                          <td class="text-center">
                              <div class="btn-group">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-sync"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </div></td>
                      </tr>

                      <tr>
                          <td>1</td>
                          <td>Usuario Admin</td>
                          <td>admin</td>
                          <td class="text-center">
                              <img src="vistas/img/plantilla/user8-128x128.jpg" class="img-thumbnail" width="40px" alt="user img"></td>
                          <td>Administrador</td>
                          <td>
                              <i class="fa fa-circle text-success"></i>Activado</td>
                          <td>25-03-2020 21:45:32</td>
                          <td class="text-center">
                              <div class="btn-group">
                                    <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-sync"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </div></td>
                      </tr>
                
                  </tbody>                
                </table> 

              </div>
            </div>
          </div>
        </div>
        
    </section>
    <!-- /.content -->
      <!-- /.ventana modal-->
      <div class="modal fade" id="modalAddUser">
        <div class="modal-dialog ">
          <div class="modal-content">
          <form id="registroVal" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Registrar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              <div class="box-body">
                
                <div class="form-group">

                 <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="nvUserName" placeholder="Ingresar nombre de usuario"  required>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" name="nvUser" placeholder="Ingresar usuario" required>
                </div>
              
              </div>

              <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="nvPass" placeholder="Ingresar contraseña" autocomplete="off" required>
                </div>

              </div>
               <div class="form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-book"></i></span>             
                  <select class="custom-select"  name="nvPerfil" required>
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                   
                      <div class="custom-file">
                         <input type="file" class="custom-file-input" id="edtFoto" name="edtFoto" lang="es" required>
                         <label class="custom-file-label" for="validatedCustomFile">Seleccionar foto de perfil...</label>
                        <div class="invalid-feedback">Peso maximo de 200 MB</div>
                      </div>                      
                    </div>
                     <div class="figure-img text-right">
                    <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
                    </div>
              </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-outline-primary">Registrar</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->    
    </div>
  <!-- /.content-wrapper -->
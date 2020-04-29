 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1> 
          </div>
          <!-- /.col -->
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
                  <i class="fas fa-cogs"></i>
                  Administrar usuarios</h3>
                    <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modalAddUser"><i class="fa fa-database"></i> Registrar usuario</button>
              </div>

              <div class="card-body table-responsive">             

                <table id="tbusuarios" class="table table-bordered dt-responsive tablas" width="100%">
                
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
                    
                    <?php 

                    $item = null;
                    $valor = null;

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor); 

                    foreach ($usuarios as $key => $value) {
                     
                      echo
                      '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';

                          if ($value["foto"] != "") {
                            
                            echo 

                            '<td class="text-center">
                              <img src="'.$value["foto"].'" class="user-image img-circle" width="40px" alt="user img">
                            </td>';

                          }else{

                            echo 

                            '<td class="text-center">
                              <img src="vistas/img/usuarios/default/perfil.jpg" class="user-image img-circle" width="40px" alt="user img">
                            </td>';

                          }
                         
                        echo '<td>'.$value["perfil"].'</td>';

                          if ($value["estado"] != 0) {

                            echo '<td>
                        
                              <button class="btn btn-primary btn-xs btnActivar"  idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button>
                           
                          </td>';
                           
                          } else{

                            echo '<td>
                        <button class="btn btn-secondary btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button>
                      
                          </td>';

                          }
                          
                          

                          echo '<td>'.$value["ultimo_login"].'</td>

                          <td class="text-center">
                              <div class="btn-group">

                                    <button class="btn btn-info btn-sm btnEdtUser" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditUser"><i class="fas fa-pencil-alt"></i> Editar</button>

                                    <button class="btn btn-danger btn-sm btnDel" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fas fa-trash"></i> Eliminar</button>
                              </div>
                          </td>

                      </tr>';

                    }                   

                ?>

              </tbody>                
                </table> 

              </div>
            </div>
          </div>
        </div>
      </div>
        
    </section>
    <!-- /.content -->


  <!--=============================================
              MODAL REGISTRAR USUARIO
  =============================================-->

      <div class="modal fade" id="modalAddUser" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-primary card-outline">
          <form  id="registroVal"  role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-database"></i> Registrar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">

                  <div class="col-9">
                
                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nvUserName" placeholder="Ingresar su nombre" autocomplete="off"  required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" name="nvUser" id="nvUser" placeholder="Ingresar usuario"  autocomplete="off" required>
                    </div>              
                  </div>

                  </div>

                  <div class="col-3 figure-img">
                    <img src="vistas/img/usuarios/default/perfil.jpg" class="img-thumbnail previsualizar" width="100px">
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
                         <?php 

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                        foreach ($usuarios as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["perfil"].'</option>';
                        }

                         ?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input nvFoto" name="nvFoto">
                        <label class="custom-file-label">Subir foto de perfil</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-upload"></i></span>
                      </div>
                    </div>
                    <small  class="form-text text-muted">Peso maximo 2 MB</small>
              </div>    
          </div>
         </div>

              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Salir</button>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button>
              </div>

             <?php 

              $crearUsuario = new ControladorUsuarios();
              $crearUsuario -> ctrCrearUsuario();

              ?>

          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 

  <!--=============================================
              MODAL EDITAR USUARIO
  =============================================-->

      <div class="modal fade" id="modalEditUser" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-warning card-outline">
          <form  id="editarVal" role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Editar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">
                  <div class="col-9">
                <div class="form-group">
                 <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" id="edtUserName" name="edtUserName" value=" " autocomplete="off"  required>
                  </div>
                </div>

              <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" id="edtUser" name="edtUser" value=" "  autocomplete="off" readonly>
                </div>              
              </div>
              </div>
              <div class="col-3 figure-img d-block">
                    <img src="vistas/img/usuarios/default/perfil.jpg" class="img-thumbnail previsualizar" width="100px">
                    <input type="hidden" id="fotoNow" name="fotoNow">
                </div>
            
            </div>

              <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" class="form-control" name="edtPass" placeholder="Ingresar nueva contraseña" autocomplete="off">
                  <input type="hidden" class="form-control" id="passNow" name="passNow">
                </div>

              </div>

               <div class="form-group">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-address-book"></i></span>       
                      <select class="custom-select"  name="edtPerfil" required>
                        <option value="" id="edtPerfil"></option>
                           <?php 

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                        foreach ($usuarios as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'" >'.$value["perfil"].'</option>';
                        }

                         ?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input nvFoto" name="edtFoto">
                        <label class="custom-file-label">Subir foto de perfil</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-upload"></i></span>
                      </div>
                    </div>
                    <small  class="form-text text-muted">Peso maximo de 2 MB</small>
              </div> 

                
          </div>
         </div>

        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Salir</button>
              <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sync"></i> Actualizar cambios</button>
         </div>

          <?php 

            $edtUsuario = new ControladorUsuarios();
            $edtUsuario -> ctrEditarUsuario();

           ?>

          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 


</div>

<?php 

              $borrarUsuario = new ControladorUsuarios();
              $borrarUsuario -> ctrBorrarUsuario();

              ?>

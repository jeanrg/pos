 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clientes</h1> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt text-muted"></i><a href="inicio" class="font-weight-bold text-secondary"> Inicio</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
                <h3 class="card-title text-muted">
                  <i class="fas fa-cogs"></i>
                  Administrar clientes</h3>
                    <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modalAddCliente"><i class="fa fa-database"></i> Registrar cliente</button>
              </div>

              <div class="card-body pb-0"> 

                <div class="row d-flex align-items-stretch">

                  <?php 

                  $item = null;
                  $valor = null;

                  $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


                  foreach ($clientes as $key => $value) {



                    //texto Capitalize
                    $foo = $value["nombre"];
                    $bar = ucwords(strtolower($foo));
                   
                    echo '  
                  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header form-inline text-muted border-bottom-0">
                  ['.($key+1).']

                   <div class="tools ml-auto">
                     <a href="#" class="fas fa-edit btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'" style="color:#d9e0e8"></a>
                      <a href="#" class="fas fa-trash btnEliminarCliente" idCliente="'.$value["id"].'" style="color:#d9e0e8;"></a>
                    </div>
                </div>

                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h4 class="lead"><b class="text-capitalize">'.$bar.'</b></h4>
                      <p class="text-muted small"><b>DNI </b> '.$value["dni"].' </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fab fa-lg fa-whatsapp"></i></span> '.$value["telefono"].'</li>
                        <li class="small"><span class="fa-li"><i class="far fa-lg fa-envelope"></i></span> '.$value["email"].'</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar-alt"></i></span> Ultima Compra: 22/11/27</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img class="img-circle img-fluid" avatar="'.$value["nombre"].'">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Ver Perfil
                    </a>
                  </div>
                </div>
              </div>
            </div>';

                  }

               ?>
                 
               </div>
             </div>
              <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Clientes Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>

              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>

              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
        
    </section>
    <!-- /.content -->
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

  <!--=============================================
              MODAL REGISTRAR CLIENTE
  =============================================-->

      <div class="modal fade" id="modalAddCliente" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-primary card-outline">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-database"></i> Registrar cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">

                  <div class="col-12">

                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="document" min="0" class="form-control dni" name="dni" id="dni" placeholder="DNI" data-inputmask="'mask':['99999999']" data-mask required>
                    <div class="text-right">
                      <button type="button" class="btn bg-teal mostrar">               
                      <i class="fas fa-search"></i>                  
                      </button>
                  </div>
                    </div>              
                  </div>
                
                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                    </div>
                    <input type="text" class="form-control text-break datos" name="nvClienteName" placeholder="Nombre cliente" autocomplete="off"  required>
                    </div>
                  </div>

                  </div>

                </div>

              <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" name="nvDireccion" placeholder="Direccion" autocomplete="off" required>
                </div>

              </div>

               <div class="form-group">

                  <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-lg fa-whatsapp"></i></span>
                  </div>
                  <input type="text" class="form-control" name="nvTelefono" placeholder="Telefono" data-inputmask="'mask':'(999) 999-999'" data-mask required>
                </div>

              </div>

                <div class="form-group">

                  <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lg fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" name="nvEmail" placeholder="Email" autocomplete="off" required>
                </div>

              </div>
  
          </div>
         </div>

              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Salir</button>
              <button type="submit" class="btn bg-teal btn-sm"><i class="fa fa-save"></i> Registrar</button>
              </div>

          </form>

          <?php 

           $crearCliente = new ControladorClientes();
           $crearCliente -> ctrCrearCliente();

           ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 

   <!--=============================================
              MODAL EDITAR CLIENTE
  =============================================-->

      <div class="modal fade" id="modalEditarCliente" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-primary card-outline">
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-database"></i> Editar cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">

                  <div class="col-12">

                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    </div>
                    <input type="document" min="0" class="form-control dni" name="edtdni" id="edtdni" data-inputmask="'mask':['99999999']" data-mask required>
                    </div>              
                  </div>
                
                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-portrait"></i></span>
                    </div>
                    <input type="text" class="form-control text-break datos" name="edtClienteName" id="edtClienteName" autocomplete="off"  required>
                    <input type="hidden" id="idCliente" name="idCliente">
                    </div>
                  </div>

                  </div>

                </div>

              <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" name="edtDireccion" id="edtDireccion" autocomplete="off" required>
                </div>

              </div>

               <div class="form-group">

                  <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-lg fa-whatsapp"></i></span>
                  </div>
                  <input type="text" class="form-control" name="edtTelefono" id="edtTelefono" data-inputmask="'mask':'(999) 999-999'" data-mask required>
                </div>

              </div>

                <div class="form-group">

                  <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lg fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" name="edtEmail" id="edtEmail" autocomplete="off" required>
                  <input type="hidden" name="edtfechaRegistro" id="edtfechaRegistro">
                </div>

              </div>
 
          </div>
         </div>

              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Salir</button>
              <button type="submit" class="btn bg-teal btn-sm"><i class="fa fa-save"></i> Guardar cambios</button>
              </div>

          </form>

     <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 

    <?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>
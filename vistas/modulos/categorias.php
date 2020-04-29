 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categorias</h1> 
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt text-muted"></i><a href="inicio" class="font-weight-bold text-secondary"> Inicio</a></li>
              <li class="breadcrumb-item active">Categorias</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-cogs"></i> Administrar categorias</h3> 
        </div>
        <div class="card-body">

          <div class="row">
            
              <div class="col-md-5">
                  <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title"><i class="fa fa-database"></i> Agregar categoria</h3>
                      </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form role="form" method="post">
                    <div class="form-group">
                      <fieldset>Nombre</fieldset>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                    </div>
                    <input type="text" class="form-control"  name="nvCat" placeholder="Ingresar nombre categoria" autocomplete="off"  required>
                    </div>
                  </div>

                  <div class="form-group">
                    <fieldset>Slug</fieldset>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-circle"></i></span>
                    </div>
                    <input type="text" class="form-control"   name="nvSlugCat"  autocomplete="off"  required>
                    </div>
                  </div>

                  <div class="form-group">
                      <fieldset>Descripcion</fieldset>
                        <textarea class="form-control"  name="nvDesCat" rows="1" placeholder="Ingresar una descripcion..."></textarea>
                  </div>             

              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right d-inline">
                <div class="ajax-button">
                    <button class="btn btn-info btn-sm submit" type="submit" >Guardar</button>
                  </div>
            </div>

             <?php 

              $crearCategoria = new ControladorCategorias();
              $crearCategoria -> ctrCrearCategoria();

              ?>
  
            </form>
            </div>
            <!-- /.card -->
         
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card card-info">
              <div class="card-header d-block">
                <h3 class="card-title">Categorías & Opciones</h3>
                 <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">

                 <table class="table table-striped dt-responsive tablas" width="100%">
                  <thead>                  
                    <tr>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Slug</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach ($categorias as $key => $value) {
           
            echo '<tr>

                     
                      <td class="text-Uppercase">
                       
                           '.$value["NomCategoria"].'

                      </td>

                      <td>
                       '.$value["descripcion"].'
                      </td>

                      <td class="text-left">
                       <a href="#" class="link-info" > '.$value["slug"].'</a>
                      </td>

                      <td>

                       <div class="tools btn-group">
                      
                      <button type="button" class="btn btn-default btn-sm btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditCategoria"><i class="fas fa-edit"></i></button>
                     
                      <button type="button" class="btn btn-default btn-sm btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="far fa-trash-alt"></i></button>
                      
                      <a href="categorias/'.$value["slug"].'" type="button" slug="'.$value["slug"].'" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></a>

                      </div>
                         
                      </td>

                    </tr>';

                      }

        ?>
                
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
            
          </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

  <!--=============================================
              MODAL EDITAR USUARIO
  =============================================-->

      <div class="modal fade" id="modalEditCategoria" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-warning card-outline">
          <form  id="editarVal" role="form" method="post">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Editar categoría</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="form-group">
                 <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                  </div>
                  <input type="text" class="form-control" id="edtCatName" name="edtCatName" autocomplete="off"  required>
                  </div>
                  <input type="hidden"  name="idCategoria" id="idCategoria" required>
                </div>

                  <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-circle"></i></span>
                  </div>
                  <input type="text" class="form-control" id="edtSlug" name="edtSlug" autocomplete="off" required>
                </div>

              </div>

              <div class="form-group">
                 <fieldset>Descripcion</fieldset>
                  
                  <textarea class="form-control" id="edtDesc" name="edtDesc" rows="1" required></textarea>
    
                   
              </div>
                    

            


                
          </div>
         </div>

        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Salir</button>
              <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sync"></i> Actualizar cambios</button>
         </div>

          <?php 

            $edtCategoria = new ControladorCategorias();
            $edtCategoria -> ctrEditarCategoria();

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

              $borrarCategoria = new ControladorCategorias();
              $borrarCategoria -> ctrBorrarCategoria();

              ?>
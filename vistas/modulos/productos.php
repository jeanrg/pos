 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Productos</h1> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="nav-icon fas fa-tachometer-alt text-muted"></i><a href="inicio" class="font-weight-bold text-secondary"> Inicio</a></li>
              <li class="breadcrumb-item active">productos</li>
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
                           Administrar productos</h3>
                            <button type="button" class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#modalAddProduc"><i class="fa fa-database"></i> Registrar productos</button>
                      </div>

              <div class="card-body table-responsive">             

                <table class="table table-striped table-bordered dt-responsive tbProductos" width="100%">
                
                  <thead>

                      <tr>
                          <th style="width: 10px">#</th>
                          <th>Img</th>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>$Compra</th>
                          <th>$Venta</th>
                          <th>Agregado</th>
                          <th>Acciones</th>
                      </tr>

                  </thead>

                  <thead>

                      <tfoot>

                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Img</th>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Categoria</th>
                          <th>Stock</th>
                          <th>$Compra</th>
                          <th>$Venta</th>
                          <th>Agregado</th>
                          <th>Acciones</th>
                      </tr>

                  </tfoot>

                </table> 

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

   <!--=============================================
              MODAL REGISTRAR PRODUCTO
  =============================================-->

      <div class="modal fade" id="modalAddProduc" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-primary card-outline">
          <form  id="registroVal"  role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-database"></i> Registrar producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">

                  <div class="col-9">

                    <div class="form-group">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-bookmark"></i></span>       
                      <select class="custom-select"  name="nvCategoria" id="nvCategoria" required>
                        <option value=" ">Seleccionar categoria</option>
                        
                        <?php 

                        $item = null;
                        $valor = null;

                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                        foreach ($categorias as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["NomCategoria"].'</option>';
                        }

                         ?>
                      </select>
                  </div>
              </div>
                
                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nvPrCode" name="nvPrCode" placeholder="Ingresar codigo" autocomplete="off" readonly required>
                    </div>
                  </div>

                  </div>

                  <div class="col-3 figure-img">
                    <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                  </div>

                </div>

                <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text"class="form-control" name="nvPrDesc"  placeholder="Ingresar una descripcion...">
                    </div>              
                  </div>

                <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                  <input type="number" class="form-control" min="0" placeholder="Stock" name="nvStock" required>
                  <div class="input-group-append">
                          <span class="input-group-text text-info">#</span>
                  </div>
                </div>

              </div>
                
                
                <div class="form-row">

                <div class="col-xs-12 col-sm-6">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign text-info"></i></span>
                        </div>
                        
                            <input type="number" class="form-control text-info" placeholder="Precio compra" id="nvPrCompra" step="any" name="nvPrCompra" min="0" required>

                        <div class="input-group-append">
                          <span class="input-group-text text-info">0.00</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">

                  <div class="input-group">

                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign text-success"></i></span>
                      </div>

                          <input type="number" class="form-control text-success" min="0" placeholder="Precio venta" id="nvPrVenta" step="any" name="nvPrVenta" required>

                      <div class="input-group-append">
                          <span class="input-group-text text-success">0.00</span>
                      </div>
                  
                </div>

              </div>
            </div>

                <div class="form-row mt-3">

                  <div class="col-xs-4 col-sm-6 ">
                  </div>

                <!-- CHECKBOX PARA PORCENTAJE -->

                <div class="col-xs-4 col-sm-3">
                                 
                      <div class="form-group">

                          <label class="text-muted">
                          <input type="checkbox"class="form-control minimal porcentaje" checked> Aplicar porcentaje
                         </label>
                      
                      </div>
              </div>
                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-4 col-sm-3 p-0">

                    <div class="input-group">                      
                      <input type="number" class="form-control input-sm nvPorcentaje" min="0" value="40" required>
                      <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent text-primary"></i></span>
                      </div>
                    </div>
                </div>  

               </div>
              

                <div class="form-group mt-2">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input nvImg" name="nvImg">
                        <label class="custom-file-label">Subir imagen del producto</label>
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
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Guardar</button>
        </div>


          </form>

          <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

          ?> 

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 



   <!--=============================================
              MODAL EDITAR PRODUCTO
  =============================================-->

      <div class="modal fade" id="modalEditProducto" role="dialog">
        <div class="modal-dialog ">
          <div class="modal-content card-primary card-outline">
          <form   role="form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-database"></i> Editar producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
             
              <div class="box-body">

                <div class="row">

                  <div class="col-9">

                    <div class="form-group">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-bookmark"></i></span>       
                      <select class="form-control input-group-lg"  name="editarCategoria" readonly required>

                        <option id="editarCategoria"></option>
                        
                      </select>
                  </div>
              </div>
                
                  <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                    </div>
                    <input type="text" class="form-control input-group-lg" id="editarCodigo" name="editarCodigo" autocomplete="off" readonly required>
                    </div>
                  </div>

                  </div>

                  <div class="col-3 figure-img">
                    <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                  </div>

                </div>

                <div class="form-group">
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text"class="form-control input-group-lg" name="editarDescripcion" id="editarDescripcion" >
                    </div>              
                  </div>

                <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                  <input type="number" class="form-control input-group-lg" min="0" id="editarStock" name="editarStock" required>
                  <div class="input-group-append">
                      <span class="input-group-text text-info">#</span>
                  </div>
                </div>

              </div>
                
                
                <div class="form-row">

                <div class="col-xs-12 col-sm-6">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign text-info"></i></span>
                        </div>
                        
                            <input type="number" class="form-control text-info input-group-sm" id="editarPrecioCompra" step="any" name="editarPrecioCompra" min="0" required>

                        <div class="input-group-append">
                          <span class="input-group-text text-info">0.00</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">

                  <div class="input-group">

                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign text-success"></i></span>
                      </div>

                          <input type="number" class="form-control text-success input-group-sm" min="0" id="editarPrecioVenta" step="any" name="editarPrecioVenta" readonly required>

                      <div class="input-group-append">
                          <span class="input-group-text text-success">0.00</span>
                      </div>
                  
                </div>

              </div>
            </div>

                <div class="form-row mt-3">

                  <div class="col-xs-4 col-sm-6">
                  </div>

                <!-- CHECKBOX PARA PORCENTAJE -->

                <div class="col-xs-4 col-sm-3">
                                 
                      <div class="form-group">

                          <label class="text-muted">
                          <input type="checkbox"class="form-control minimal porcentaje" checked> Aplicar porcentaje
                         </label>
                      
                      </div>
              </div>
                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-4 col-sm-3 p-0">

                    <div class="input-group">                      
                      <input type="number" class="form-control input-sm nvPorcentaje" min="0" value="40" required>
                      <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent text-primary"></i></span>
                      </div>
                    </div>
                </div>  

               </div>
              

                <div class="form-group mt-2">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input nvImg" name="editarImg">
                        <label class="custom-file-label">Subir imagen del producto</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-upload"></i></span>
                      </div>
                    </div>
                    <small  class="form-text text-muted">Peso maximo 2 MB</small>
              </div>   
              
              <input type="hidden" name="imagenActual" id="imagenActual">

          </div>
         </div>


        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Editar cambios</button>
        </div>

          </form>

        <?php 

        $editarProducto = new ControladorProductos();
        $editarProducto -> ctrEditarProducto();

        ?>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 

      <?php 

        $borrarProducto = new ControladorProductos();
        $borrarProducto -> ctrEliminarProducto();

        ?>
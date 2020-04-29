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
                            <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#modalAddProduc"><i class="fa fa-database"></i> Registrar productos</button>
                      </div>

              <div class="card-body table-responsive">             

                <table id="tbproductos" class="table table-bordered  table-striped dt-responsive tablas" width="100%">
                
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

                  <tbody>

                    <tr>

                      <td>1</td>

                      <td>

                        <img src="vistas/img/productos/default/anonymous.png" class="user-image img-circle img-thumbnail" width="40px" alt="">

                      </td>

                      <td>0001</td>

                      <td>Lorem ipsum dolor sit amet</td>

                      <td>Lorem ipsum</td>

                      <td>20</td>

                      <td>5.00</td>

                      <td>10.00</td>

                      <td>2020-04-12 12:05:33</td>

                      <td>
                
                        <div class="tools btn-group">
                      
                          <button type="button" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></button>

                          <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>

                          <button type="button" class="btn btn-default btn-sm"><i class="fas fa-eye"></i></button>

                        </div>

                      </td>
              
                  </tr>              

                  </tbody>   

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
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nvPrCode" placeholder="Ingresar codigo" autocomplete="off"  required>
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

                  </div>

                  <div class="col-3 figure-img">
                    <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                  </div>

                </div>

              <div class="form-group">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-bookmark"></i></span>       
                      <select class="custom-select"  name="nvCategoria" required>
                        <option value="">Seleccionar categoria</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Especial">Especial</option>
                        <option value="Vendedor">Vendedor</option>
                      </select>
                  </div>
              </div>

                <div class="form-group">

                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                  <input type="number" class="form-control" min="0" placeholder="Stock" name="nvStock" required>
                </div>

              </div>
                
                
                <div class="form-row">

                <div class="col-xs-12 col-sm-6">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        
                            <input type="number" class="form-control" placeholder="Precio compra" name="nvPrCompra" min="0" required>

                        <div class="input-group-append">
                          <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">

                  <div class="input-group">

                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                      </div>

                          <input type="number" class="form-control" min="0" placeholder="Precio venta" name="nvPrVenta" required>

                      <div class="input-group-append">
                          <span class="input-group-text">.00</span>
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
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input porcentaje" type="checkbox" id="porcentaje" checked>
                          <label for="porcentaje" class="custom-control-label text-muted">Aplicar porcentaje</label>
                        </div>

                </div>
              </div>
                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-4 col-sm-3 p-1">

                    <div class="input-group">                      
                      <input type="number" class="form-control input-sm nuevoPorcentaje" min="0" value="40" required>
                      <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                      </div>
                    </div>
                </div>  

               </div>
              

                <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input nvFoto" name="nvFoto">
                        <label class="custom-file-label">Subir imagen del producto</label>
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
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Guardar</button>
        </div>


          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 
 <?php

Class ControladorProductos{

	/*=========================================
	=            MOSTRAR PRODUCTOS            =
	=========================================*/
	
	
	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nvPrDesc"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nvPrDesc"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nvStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["nvPrCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nvPrVenta"])){

			   /*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   $ruta = "vistas/img/productos/default/anonymous.png";

			   if(isset($_FILES["nvImg"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nvImg"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["nvPrCode"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nvImg"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						
						$aleatorio = mt_rand(100,999);
						$nameImgCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/productos/".$_POST["nvPrCode"]."/".$nameImgCryptar.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nvImg"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nvImg"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameImgCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/productos/".$_POST["nvPrCode"]."/".$nameImgCryptar.".png";

						$origen = imagecreatefrompng($_FILES["nvImg"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}
			   
			   $tabla = "productos";
			   $datos = array("idCategoria" => $_POST["nvCategoria"],
							   "codigo" => $_POST["nvPrCode"],
							   "descripcion" => $_POST["nvPrDesc"],
							   "stock" => $_POST["nvStock"],
							   "precioCompra" => $_POST["nvPrCompra"],
							   "precioVenta" => $_POST["nvPrVenta"],
							   "imagen" => $ruta);


			   	$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal.fire({
							  toast: true,
      						  showConfirmButton: false,
      						  timer: 3000,
							  type: "success",
							  title: "El producto ha sido guardado correctamente"
							  })

						</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  toast: true,
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
	

}
}
} 

/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["editarImg"]["tmp_name"]) && !empty($_FILES["editarImg"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImg"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImg"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameImgCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$nameImgCryptar.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImg"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImg"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameImgCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$nameImgCryptar.".png";

						$origen = imagecreatefrompng($_FILES["editarImg"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "productos";

				$datos = array("idCategoria" => $_POST["editarCategoria"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "stock" => $_POST["editarStock"],
							   "precioCompra" => $_POST["editarPrecioCompra"],
							   "precioVenta" => $_POST["editarPrecioVenta"],
							   "imagen" => $ruta);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal.fire({
							  toast: true,
      						  showConfirmButton: false,
      						  timer: 3000,
							  type: "success",
							  title: "Producto editado",
							  confirmButtonText: "Cerrar"
							  })

						</script>';

				}


			}else{

				echo'<script>

					swal.fire({
						  toast: true,
      					  showConfirmButton: false,
      					  timer: 4000,
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal.fire({
					  toast: true,
      				  timer: 3000,
					  type: "success",
					  title: "Producto borrado",
					  showConfirmButton: false
					  })

				</script>';

			}		
		}


	}

}
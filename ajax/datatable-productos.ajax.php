<?php 

		require_once "../controladores/productos.controlador.php";
		require_once "../modelos/productos.modelo.php";

		require_once "../controladores/categorias.controlador.php";
		require_once "../modelos/categorias.modelo.php";

/*================================================
=            MOSTRAR TABLA PRODUCTOS             =
================================================*/
class TablaProductos{

	public function mostrarTablaProductos(){

		$item = null;
		$valor = null;

		$productos= ControladorProductos::ctrMostrarProductos($item, $valor);

		$datosJson = '{
			"data": [';

			for ($i = 0; $i < count($productos); $i++){

				$img = "<img class='img-thumbnail' src='".$productos[$i]["imagen"]."' width='40px'>";

				$item = "id";
				$valor = $productos[$i]["idCategoria"];

				$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

				/* STOCK */

				if ($productos[$i]["stock"] <=10) {
					
					$stock = "<button class='btn btn-danger btn-circle'>".$productos[$i]["stock"]."</button>";
				}else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <=15){

					$stock = "<button class='btn btn-warning btn-circle'>".$productos[$i]["stock"]."</button>";

				}else{
					$stock = "<button class='btn btn-success btn-circle'>".$productos[$i]["stock"]."</button>";
				}				
				

				$botones = "<div class='tools btn-group'><button type='button' class='btn btn-default btn-sm btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditProducto'><i class='fas fa-edit text-danger'></i></button><button type='button' class='btn btn-default btn-sm btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='far fa-trash-alt text-danger'></i></button></div>";

				$datosJson .='[
					      "'.($i+1).'",
					      "'.$img.'",
					      "'.$productos[$i]["codigo"].'",
					      "'.$productos[$i]["descripcion"].'",
					      "'.$categorias["NomCategoria"].'",
					      "'.$stock.'",
					      "'.$productos[$i]["precioCompra"].'",
					 	  "'.$productos[$i]["precioVenta"].'",
					 	  "'.$productos[$i]["fecha"].'",
					      "'.$botones.'"
					    ],';
				}

			$datosJson = substr($datosJson, 0,-1);

			$datosJson .=  ']

			}';

			echo $datosJson;

	}	
	
}

/*================================================
=            ACTIVAR TABLA PRODUCTOS             =
================================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();



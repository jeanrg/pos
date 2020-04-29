<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["username"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["userpass"])){

				$cryptar = crypt($_POST["userpass"], '$2a$07$usesomesillystringforsalt$');
				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["username"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

					if($respuesta["usuario"] == $_POST["username"] && $respuesta["password"] == $cryptar ){

					if ($respuesta["estado"] == 1) 

					{					

					$_SESSION["iniciarSesion"]	= "ok";
					$_SESSION["id"]	= $respuesta ["id"];
					$_SESSION["nombre"]	= $respuesta ["nombre"];
					$_SESSION["usuario"] =$respuesta ["usuario"];
					$_SESSION["foto"]	= $respuesta ["foto"];
					$_SESSION["perfil"]	= $respuesta ["perfil"];

				/*=============================================
							ULTIMO INGRESO
				=============================================*/

				date_default_timezone_set('America/Lima');

				$fecha = date('Y/m/d');
				$hora = date('H-i-s');

				$fechaActual = $fecha.' '.$hora;

				$item1 = "ultimo_login";
				$valor1 = $fechaActual;

				$item2 = "id";
				$valor2 = $respuesta["id"];

				$ultimo_login = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

				if ($ultimo_login == "ok") {

					echo '<script>
						
						window.location = "inicio";

						</script>';
				}
				
					}else{

						echo '<div class="alert alert-danger text-center" role="alert">Usuario desactivado</div>';
					}

					}else {

						echo '<div class="alert alert-danger text-center" role="alert">Error al ingresar</div>';
					}	
				}
			}
		}

	/*=============================================
			    CREAR USUARIO	
	=============================================*/

		static public function ctrCrearUsuario(){

			if(isset($_POST["nvUser"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nvUserName"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nvUser"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nvPass"])){	

				/*======================================
				=            VALIDAD IMAGEN            =
				======================================*/
				$ruta = "";

				if(isset($_FILES["nvFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nvFoto"]["tmp_name"]);

					$nvAncho = 500;
					$nvAlto = 500;

				/*======================================
				=        DIRECTORIO DE IMAGENES        =
				======================================*/

				$directorio = "vistas/img/usuarios/".$_POST["nvUser"];

				mkdir($directorio, 0755);

				/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nvFoto"]["type"] == "image/jpeg"){

				/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameFotoCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/usuarios/".$_POST["nvUser"]."/".$nameFotoCryptar.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nvFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nvAncho, $nvAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvAncho, $nvAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);				
				
				}			

				if($_FILES["nvFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameFotoCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/usuarios/".$_POST["nvUser"]."/".$nameFotoCryptar.".png";

						$origen = imagecreatefrompng($_FILES["nvFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nvAncho, $nvAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvAncho, $nvAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}	
				}

			   $tabla = "usuarios";

			   //CRYPT_BLOWFISH
			   $cryptar = crypt($_POST["nvPass"], '$2a$07$usesomesillystringforsalt$');

			   $datos=  array("nombre" => $_POST["nvUserName"] ,
			   				  "usuario" => $_POST["nvUser"] ,
			   				  "password" => $cryptar ,
			   				  "perfil" => $_POST["nvPerfil"],
			   				  "foto" => $ruta  );	

			   	$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

			   	if ($respuesta == "ok") 
			   	{

			   		echo "<script>
		
						swal.fire({
      					showConfirmButton: true,
 						type: 'success',
						title: '¡Registro exitoso!'
					}).then((result)=>{
						if(result.value){
							window.location = 'usuarios';
						}
						});		

				</script>";			   		

			  	}
				 
			}else{

				echo "<script>
		
						swal.fire({
      					showConfirmButton: true,
 						type: 'error',
						title: '¡El usuario no puede ir vacío o llevar caracteres especiales!',
						icon: 'fas fa-envelope fa-lg'
					}).then((result)=>{
						if(result.value){
							window.location = 'usuarios';
						}
						});			

				</script>";
			}
		}
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor)
	{

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario()
	{

		if (isset($_POST["edtUser"])) 
			{

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["edtUserName"]))
				{

				/*======================================
				=            VALIDAD IMAGEN            =
				======================================*/
				$ruta = $_POST["fotoNow"];

				if(isset($_FILES["edtFoto"]["tmp_name"]) && !empty($_FILES["edtFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["edtFoto"]["tmp_name"]);

					$nvAncho = 500;
					$nvAlto = 500;

				/*======================================
				=        DIRECTORIO DE IMAGENES        =
				======================================*/

				$directorio = "vistas/img/usuarios/".$_POST["edtUser"];

				/*======================================
				=    SI EXISTE FOTO EN BASE DE DATOS   =
				======================================*/

				if (!empty($_POST["fotoNow"])) 
					{

					unlink($_POST["fotoNow"]);
					
					}else
						{

						mkdir($directorio, 0755);

						}				

				/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["edtFoto"]["type"] == "image/jpeg")

					{

				/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameFotoCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/usuarios/".$_POST["edtUser"]."/".$nameFotoCryptar.".jpg";

						$origen = imagecreatefromjpeg($_FILES["edtFoto"]["tmp_name"]);					

						$destino = imagecreatetruecolor($nvAncho, $nvAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvAncho, $nvAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);				
				
					}			

				if($_FILES["edtFoto"]["type"] == "image/png")

					{

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$nameFotoCryptar = md5($aleatorio.time());

						$ruta = "vistas/img/usuarios/".$_POST["edtUser"]."/".$nameFotoCryptar.".png";

						$origen = imagecreatefrompng($_FILES["edtFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nvAncho, $nvAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nvAncho, $nvAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}	
				}

				$tabla = "usuarios";

				if ($_POST["edtPass"] != "") 
					{

						if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["edtPass"]))
							{

							$cryptar = crypt($_POST["edtPass"], '$2a$07$usesomesillystringforsalt$');

							}else{

								echo "<script>
		
						swal.fire({
      					showConfirmButton: true,
 						type: 'error',
						title: '¡La contraseña no puede ir vacía o llevar caracteres especiales!'
					}).then((result)=>{
						if(result.value){
							window.location = 'usuarios';
						}
						});			

				</script>";


							}

					}else{

						$cryptar = $passNow;
					}

					$datos =  array("nombre" => $_POST["edtUserName"],
									"usuario" => $_POST["edtUser"],
									"password" => $cryptar,
									"perfil" => $_POST["edtPerfil"],
									"foto" => $ruta);

					$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

					if ($respuesta == "ok") 
					{
						
						echo "<script>
		
						swal.fire({
      					showConfirmButton: true,
 						type: 'success',
						title: '¡Usuario editado!'
					}).then((result)=>{
						if(result.value){
							window.location = 'usuarios';
						}
						});		

				</script>";

					}

			}
			else{

				echo "<script>
		
						swal.fire({
      					showConfirmButton: true,
 						type: 'error',
						title: '¡El usuario no debe ir vacio!'
					}).then((result)=>{
						if(result.value){
							window.location = 'usuarios';
						}
						});		

				</script>";
			}
		}
	}  

/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal.fire({
					  toast : true,
					  type: "success",
					  title: "¡Usuario borrado!",
					  showConfirmButton: true
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}


}






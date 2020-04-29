<?php 

$_POST["nvUser"] = "Jean";

$directorio = "vistas/img/usuarios/".$_POST["nvUser"];
					
					mkdir($directorio, 0755);

				echo $directorio;

 ?>
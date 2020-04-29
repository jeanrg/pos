<?php
$documento = $_POST["dni"];
   $datos = [
   "strDni" => $documento,
   ];
   $metodo = "GET";
   $url    = "https://ww1.essalud.gob.pe/sisep/postulante/postulante/postulante_obtenerDatosPostulante.htm?";
   $luis = curl_init();
   if($metodo == 'GET') {
      curl_setopt($luis,CURLOPT_URL,$url.http_build_query($datos));
   } else {
      curl_setopt($luis,CURLOPT_URL,$url);
      curl_setopt($luis,CURLOPT_POSTFIELDS, http_build_query($datos));
   }
   curl_setopt($luis,CURLOPT_RETURNTRANSFER,true);
   $lopez = curl_exec($luis);
   $k = json_decode($lopez);
   curl_close($luis);
echo json_encode($k);
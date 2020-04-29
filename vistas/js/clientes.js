/*================================================
=            CAPTURAR DNI API ESSALUD            =
================================================*/
document.querySelector('.mostrar').addEventListener('click', function(){

	let doc = $("#dni").val();   
	obtenerDatos(doc);

});

function obtenerDatos(valor){
    
    let url = `http://localhost/api_reniec_sunat/reniec/${valor}`;

    const api = new XMLHttpRequest();
    api.open('GET', url, true);
    api.send();

    api.onreadystatechange = function(){

        if(this.status == 200 && this.readyState == 4){

            let datos = JSON.parse(this.responseText);

            console.log(datos);

                  let apellidoPaterno = datos.apellido_paterno;
                  let apellidoMaterno = datos.apellido_materno;
                  let nom = datos.nombres;

                  let nombres = apellidoPaterno+" "+apellidoMaterno+" "+nom;

                  $(".datos").val(nombres); 

      	}
      }
  }

/*$(".mostrar").click( function(){

	console.log('ok');

	let $this = $(this);
    let loadingText = '<i class="spinner-border spinner-border-sm"></i>';
    if ($(this).html() !== loadingText) {
      $this.data('original-text', $(this).html());
      $this.html(loadingText);
    }

    let doc = $("#dni").val() 
    $.ajax({
     type:"POST",
      url:"http://localhost/api_reniec_sunat/reniec/"+doc,
      dataType: "json",
      data:{dni:doc},
      cache: false,
      success: function(data){

      let apellidoPaterno = data.apellido_paterno;
      let apellidoMaterno = data.apellido_materno;
      let nom = data.nombres;
      let nombres = apellidoPaterno+" "+apellidoMaterno+" "+nom;

      $(".datos").val(nombres); 

      $this.html($this.data('original-text'));

      }
   });
});*/

/*================================================
=            CAPTURAR DNI API ESSALUD  LIVE      =
================================================*/

    $("#edtdni").keyup( function(){
    let doc = $("#edtdni").val()
    var xdc = 7;
    if (this.value.length > xdc) {
    $.ajax({
     type:"POST",
      url:"ajax/essapi.php",
      dataType: "json",
      data:{dni:doc},
      cache: false,
       beforeSend: function(){
        $(".datos").val("Consultando...");
      },
      success: function(data){
      if (!data.DatosPerson[0].Nombres=="") {

      let apellidoPaterno = data.DatosPerson[0].ApellidoPaterno;
      let apellidoMaterno = data.DatosPerson[0].ApellidoMaterno;
      let nom = data.DatosPerson[0].Nombres;
      let nombres = apellidoPaterno+" "+apellidoMaterno+" "+nom;

      $(".datos").val(nombres); 
      }
      }
    });
  }
  });

/*=====  End of CAPTURAR DNI API ESSALUD  ======*/

/*=============================================
EDITAR CLIENTE
=============================================*/
$(".card").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idCliente").val(respuesta["id"]);
      	   $("#edtdni").val(respuesta["dni"]);
	       $("#edtClienteName").val(respuesta["nombre"]);
	       $("#edtDireccion").val(respuesta["direccion"]);
	       $("#edtTelefono").val(respuesta["telefono"]);
	       $("#edtEmail").val(respuesta["email"]);
	       $("#edtfechaRegistro").val(respuesta["fechaRegistro"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".card").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal.fire({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }
 })

})

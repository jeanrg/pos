/*================================================
=            SUBIENDO FOTO DE USUARIO            =
================================================*/

$(".nvFoto").change(function(){

    var imagen = this.files[0];

/*================================================
=           FORMATO IMG VALIDACION               =
================================================*/

if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ) {

    $(".nvFoto").val("");

    swal.fire({
        toast: true,
        showConfirmButton: false,
        timer: 4000,
        title : "Error al subir la foto",
        text : "¡La imagen debe estar en formato JPG o PNG!",
        type : "error"
    });

}else if(imagen["size"] > 2000000){

  $(".nvFoto").val("");

    swal.fire({
        toast: true,
        showConfirmButton: false,
        timer: 4000,
        title : "Error al subir la foto",
        text : "¡La imagen supera los 2MB!",
        type : "error"
    });

}else{

    var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

  $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

}   

})

/*================================================
=                EDITAR USUARIO                  =
================================================*/

$(document).on("click", ".btnEdtUser", function(){

  var idUsuario = $(this).attr("idUsuario");
  
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({

    url: "ajax/usuarios.ajax.php",
    method : "POST",
    data : datos,
    cache : false,
    contentType : false,
    processData : false,
    dataType : "json",
    success : function(respuesta){

      $("#edtUserName").val(respuesta["nombre"]);
      $("#edtUser").val(respuesta["usuario"]);
      $("#edtPerfil").html(respuesta["perfil"]);
      $("#edtPerfil").val(respuesta["perfil"]);
      $("#passNow").val(respuesta["password"]);
      $("#fotoNow").val(respuesta["foto"]);

      if (respuesta["foto"] != "") {

        $(".previsualizar").attr("src", respuesta["foto"]);
      }

    }

  })

})

/*================================================
=                ACTIVAR USUARIO                  =
================================================*/

 $(document).on("click", ".btnActivar", function(){

      var idUsuario = $(this).attr("idUsuario");
      var estadoUsuario = $(this).attr("estadoUsuario");


      var datos = new FormData(); 
      datos.append("activarId", idUsuario);
      datos.append("activarUsuario", estadoUsuario);

      $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

          if (window.matchMedia("(max-width:767px)").matches) {

               swal.fire({
                toast: true,
                title : "Usuario actualizado",
                type : "success",
                confirmButtonText: "¡Cerrar!"
              }).then(function(result){
                if (result.value){
                  window.location = "usuarios";
                }
              });
          }
         }

    })

      if (estadoUsuario == 0) {

        $(this).removeClass('btn-primary');
        $(this).addClass('btn-secondary');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);

      }else{

         $(this).addClass('btn-primary');
        $(this).removeClass('btn-secondary');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);

      }

    })


 /*================================================
=                USUARIO REPETIDO                 =
================================================*/

$("#nvUser").change(function(){

  var usuario = $(this).val();
  var datos = new FormData();

  datos.append("validarUsuario", usuario);

  $.ajax({

    url:"ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData:false,
    dataType: "json",
    success:function(respuesta){

      if (respuesta) {

       swal.fire({
        position: 'top',
        toast: true,
        showConfirmButton: false,
        timer: 3000,
        title : "Usuario existente",
        type : "error"
    });
        $("#nvUser").val("");
      }

    }
  })

})

 /*================================================
=                ELIMINAR USUARIO                 =
================================================*/

$(document).on("click", ".btnDel", function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

     swal.fire({
        toast: true,
        title : '¿Borrar este usuario?',
        type : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor : '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar!'

    }).then(function(result){

      if (result.value) {

        window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
      }
    })
})

/*=============================================
=            Custom Input File                =
=============================================*/
$(document).ready(function () {
  bsCustomFileInput.init();
});

/*=============================================
=            SideBar m¿Menu                   =
=============================================*/

 $.widget.bridge('uibutton', $.ui.button)

/*=============================================
=            Data Tables                     =
=============================================*/

$(".tablas").DataTable({

	"language":{
		 "decimal":        "",
    "emptyTable":     "No hay datos disponibles en esta tabla",
    "info":           "Registros del <b> _START_</b> - <b>_END_</b> de <b>_TOTAL_</b> entradas",
    "infoEmpty":      "Registros del 0 - 0 de un total de 0",
    "infoFiltered":   "(filtrado de un total _MAX_ de registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Ver  _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron resultados",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "<b>></b>",
        "previous":   "<b><</b>"
    },
    "aria": {
        "sortAscending":  ": activar para ordenar la columna ascendente",
        "sortDescending": ": activar para ordenar la columna descendente"
    }
	}

});

/*=============================================
=           Validacion Registro               =
=============================================*/

 $('#registroVal').validate({
    rules: {
      nvPass: {
        required: true,
        minlength: 5
      },
    },
    messages: {

      nvPass: {
        required: "por favor ingrese una contraseña",
        minlength: "La contraseña debe tener al menos 5 caracteres"
      },
 
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });

    $('#editarVal').validate({
    rules: {
      edtPass: {
        required: true,
        minlength: 5
      },
    },
    messages: {

      edtPass: {
        required: "por favor ingrese una contraseña",
        minlength: "La contraseña debe tener al menos 5 caracteres"
      },
 
    },
        errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
    });

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})

/*=============================================
 //InputMask
=============================================*/

     //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

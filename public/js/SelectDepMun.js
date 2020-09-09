$(document).ready(function(){

    $('#txtDepartamento').on('change', function() {
        var id = $('#txtDepartamento').val();

        // console.log(id);
        

        $.ajax({
          url: "Mun/"+id,
          type: "GET",
          dataType: "json",
          error: function(element){
          // console.log(element);
          }, 
          success: function(respuesta){
            // console.log(respuesta);
            $("#txt_Mun").html('<option value="" selected="true"> Seleccione una opción </option>');
            respuesta.forEach(element => {
              $('#txt_Mun').append('<option value='+element.Mun_ID+'> '+element.mun_Nombre+' </option>');
            });
          }
        });
    });

    $('#txtGenero').on('change', function() {
   
      var idc = $('#txtGenero').val();
      console.log(idc);
      console.log('holaaaa');


      loadSelectRoom(idc);
      
  });

  function loadSelectRoom(idc){

    
    $.ajax({
      url: "Cuar/"+idc,
      type: "GET",
      dataType: "json",
      error: function(element){
        console.log(element);
      }, 
      success: function(respuesta){
        console.log(respuesta);
        $("#txtCuarto").html('<option value="" selected="true"> Seleccione una opción </option>');
          respuesta.forEach(element => {
          $('#txtCuarto').append('<option value='+element.Cuar_ID+'> '+element.cuar_Numero+' </option>');
        });
      }
    });
  }

    
});


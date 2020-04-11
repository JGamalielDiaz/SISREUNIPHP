@extends('plantilla')
@section('Style')
<link rel="stylesheet" href="{{asset('plantillaPlugins/css/InputHolder.css')}}">
@endsection
@section('content')
    <div class="row ">
        <div class="col-md-12 box">
            <form class="form-horizontal" action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                <div id="smartwizard">
                    <ul class="nav-justified"> 
                        <li> <a href="#InfoEstudiante">Informacion del Estudiante<br /><small>Datos Personales</small></a> </li>
                        <li> <a href="#InfoDomicilio">Informacìon de Contacto<br /><small>Datos para Contactar</small></a> </li>
                    </ul>
                    <div>
                        <br>
                        
                        <div id="InfoEstudiante">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Registro Estudiante</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                             <input type="text" name="per_Nombre" id="txtNombres" required="" > 
                                             <label for="lblNombre" >Nombres del Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <input type="text" name="per_Apellido" id="txtApellidos" required="">
                                                <label for="lblApellidos" class="col-sm-6 col-form-label">Apellidos del Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><br></div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <h6 class="col-sm-6 col-form-label">Seleccione el Genero</h6>
                                              <div class="col-sm-10">
                                                 <select name="Gen_ID" id="Per_Gen" class="form-control"></select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                              <h6 class="col-sm-8 col-form-label">Seleccione la Carrera del Estudiante</h6>
                                              <div class="col-sm-10">
                                                  <select name="Car_ID" id="Estu_IDCarrera" class="form-control"></select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                              <input type="text" name="Per_Identificacion" id="txtPer_Identificacion"  required="" >  
                                              <label for="lblCedula" >Ingrese la Cedula del Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <input type="text" name="Estu_Carnet" id="txtEstu_Carnet" required="">
                                              <label for="lblCarnetEstudiante">Ingrese el Carnet Estudiantil</label>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                              <h5 class="col-sm-6 col-form-label">Seleccione un Numero de Cuarto</h5>
                                              <div class="col-sm-10">
                                                  <select name="Cuar_ID" id="txtCuart_ID" class=" form-control selectpicker" data-style="btn-danger">
                                                  </select>
                                              </div>
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">                                                
                                             <input type="text" name="Tel_Descripcion" id="txt_Telefono" required="">
                                             <label for="lbltelfono">Numero de telefono (Opcional)</label>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div id="InfoDomicilio">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Informacion Domicilio Estudiante</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <h6 class="col-sm-6 col-form-label">Seleccione el Departamento</h6>
                                              <div class="col-sm-10">
                                                  <select name="Dep_ID" id="txtDepartamento" class="form-control selectpicker"></select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <h6 class="col-sm-6 col-form-label">Seleccione el Municipio</h6>
                                              <div class="col-sm-10">
                                                  <select name="Mun_ID" id="txt_Mun" class="form-control"></select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="Cor_Descripcion" id="txtCorreo" required="">
                                                <label for="lblCorreo" >Ingrese el Correo del Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <input type="text" name="Direccion" id="txt_Direccion" required="">
                                              <label for="lblDireccion" class="col-sm-10 col-form-label">Direccion de habitacion del Estudiante</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </form>
        </div>
    </div>
   
@endsection

@section('Scripts')


<script src="{{asset('plantillaPlugins/js/jquery.smartWizard.min.js')}}"></script>
<script text="text/javascript">

   $(document).ready(function(){

        // Smart Wizard
        $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade'
                 });

           

            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){
                    $('.btn-finish').removeClass('disabled');
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });
    });

    </script>

@endsection
@extends('plantilla')

@section('content')
    <div class="row ">
        <div class="col-md-12">
            <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                <div id="SmartWizard">
                    <ul>
                        <li> <a href="#InfoEstu">Informacion del Estudiante<br /><small>Datos Personales</small></a> </li>
                        <li> <a href="#InfoContac">Informacìon de Contacto<br /><small>Datos para Contactar</small></a> </li>
                        <li> <a href="#InfoDomi">Dirección(Nuevo)<br /><small>Domicilio del Estudiante</small></a> </li>
                    </ul>
                    <div>
                        <div id="InfoEstudiante">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Registro Estudiante</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblNombre" class="col-sm-6 col-form-label">Nombres del Estudiante</label>
                                              <div class="col-sm-10">
                                                <input type="text" name="per_Nombre" id="txtNombres" Class="form-control" placeholder="Nombres"> 
                                             </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblApellidos" class="col-sm-6 col-form-label">Apellidos del Estudiante</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="per_Apellido" id="txtApellidos" class="form-control" placeholder="Apellidos">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblGenero" class="col-sm-6 col-form-label">Seleccione el genero del estudiante</label>
                                              <div class="col-sm-10">
                                                 <select name="Gen_ID" id="Per_Gen" class="form-control"></select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblCarrera" class="col-sm-6 col-form-label">Seleccione La Carrera del Estudiante</label>
                                              <div class="col-sm-10">
                                                  <select name="Car_ID" id="Estu_IDCarrera" class="form-control"></select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblCedula" class="col-sm-6 col-form-label">Ingrese la Cedula del Estudiante</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="Per_Identificacion" id="txtPer_Identificacion" class="form-control" placeholder="Cedula Estudiante" >  
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblCarnetEstudiante" class="col-sm-6 col-form-label">Ingrese el Carnet Estudiantil</label>
                                              <div class="col-sm-10">
                                                 <input type="text" name="Estu_Carnet" id="txtEstu_Carnet" class="form-control" placeholder="Carnet Estudiantil">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="lblCuarto" class="col-sm-6 col-form-label">Seleccione El Numero de Cuarto</label>
                                              <div class="col-sm-10">
                                                  <select name="Cuar_ID" id="txtCuart_ID" class=" form-control selectpicker" data-style="btn-danger">
                                                  </select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="lbl"></label>
                                            </div>
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
    @section('Scripts')
        <script src="{{ asset ('pantillaPlugins/js/jquery.smartWizard.js')}}"></script>

        <script text="text/javascrip">

        $(document).ready(function(){


            alert('Soy un script Personalizado a la vista');
        });

        </script>

    @endsection
@endsection
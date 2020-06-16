@extends('Layout/layout')
@section('Style')
    <link rel="stylesheet" href="{{asset('plantillaPlugins/css/InputHolder.css')}}">
    <link rel="stylesheet" href="{{asset('css/smart_wizard_theme_arrows.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="{{asset('LayoutAssets/bootstrap/css/glyphicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('css/enjoyhint.css')}}">  
@endsection

@section('Content')
    <div class="row ">
        <div class="col-md-12 box">
            
            @if ($errors->any())
                <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
                </ul>
                
            @endif

            @if (Session::has('Message'))
                    <div class="alert alert-info alert-dismissible">{{ session::get('Message') }}
                        <button type="button" class="close " data-dismiss="alert">&times;</button>
                    </div>  
            @endif
               
        
            <form class="form-horizontal"  id="FormEstudent" action="{{route('student.store')}}" method="post"  accept-charset="utf-8">
                @csrf
                <div id="smartwizard">
                    <ul class="nav-justified"> 
                        <li> <a href="#InfoEstudiante">Informacion del Estudiante<br /><small>Datos Personales</small></a> </li>
                        <li> <a href="#InfoDomicilio">Informacìon de Contacto<br /><small>Datos para Contactar</small></a> </li>
                    </ul>
                    <div>
                        <div id="InfoEstudiante" class="">
                            <div class="card card-primary">
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                             <input name="per_Nombre" id="txtNombres" required="" data-parsley-length="[4,30]" data-parsley-required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"> 
                                             <label for="lblNombre" class="col-sm-13 col-form-label" >Nombres del Estudiante</label>
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
                                                <input type="text" name="per_Apellido" id="txtApellidos" required="" data-parsley-length="[4,30]" data-parsley-required data-parsley-pattern="^[a-zA-Z-ñÑ ]+$" data-parsley-trigger="keyup">
                                                <label for="lblApellidos" class="">Apellidos del Estudiante</label>
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
                                              <input type="text" name="per_Identificacion"  required="" id="txtIdentificacion" data-parsley-minlength="10" data-parsley-required data-parsley-pattern="^[a-zA-Z0-9-]+$" data-parsley-trigger="keyup">  
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
                                                <input type="text" name="est_Carnet" id="txtCarnet" required="" data-parsley-required >
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
                                                <h6 class="col-sm-13 col-form-label">Seleccione el Genero</h6>
                                              
                                                 <select name="Gen_ID" id="txtGenero" class="form-control selectpicker" data-parsley-min="1" data-parsley-error-message="Por favor selecciona un genero">
                                                     <option value='0'>--Seleccione una Opcion--</option>
                                                     @foreach ($genero as $key => $value)
                                                         <option value="{{$key}}">{{$value}}</option>
                                                     @endforeach
                                                 </select>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <h6 class="col-sm-13 col-form-label">Seleccione Un Cuarto Para el Estudiante</h6>
                                                <select name="Cuar_ID" id="txtCuarto" class=" form-control" data-parsley-min="1" data-parsley-error-message="Por favor selecciona un cuarto"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <h6 class="col-sm-13 col-form-label">Seleccione Carrera del Estudiante</h6>
                                                <select name="Car_ID" id="txtCarrera" class="form-control" data-parsley-min="1" data-parsley-error-message="Por favor selecciona un genero">
                                                    <option value="0">Selecciona Una Carrera</option>
                                                    @foreach ($carrera as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group row">                                                
                                             <input type="text" name="Tel_Descripcion" id="txtTelefono" required="" data-parseley-type="number" data-parsley-length='[8,8]'>
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

                        <div id="InfoDomicilio"  class="">
                            <div class="card card-primary">
                                <div class="card-heading">Informacion Domicilio Estudiante</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <h6 class="col-sm-6 col-form-label">Seleccione el Departamento</h6>
                                              <div class="col-sm-10">
                                                  <select name="Dep_ID" id="txtDepartamento" class="form-control selectpicker" data-parsley-min="1" data-parsley-error-message="Seleccione un Departamento">
                                                    <option value="0">Seleccione Un Departamento</option>
                                                      @foreach ($departamentos as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>  
                                                      @endforeach
                                                  </select>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <h6 class="col-sm-6 col-form-label">Seleccione el Municipio</h6>
                                              <div class="col-sm-10">
                                                  <select name="Mun_ID" id="txt_Mun" class="form-control" data-parsley-min="1" data-parsley-error-message="Seleccione un Municipio Valido">
                                                    
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="cor_Descripcion" id="txtCorreo" required=""  data-parsley-length="[8,70]" data-parsley-pattern="^[a-zA-Z0-9-@-]+$">
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
                                              <input type="text" name="dir_Descripcion" id="txt_Direccion" required="" data-parsley-pattern="^[a-zA-Z0-9- ]+$" >
                                              <label for="lblDireccion" class="col-sm-10 col-form-label">Direccion de habitacion del Estudiante</label>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Guardar Informacion</button>
                                        </div>
                                        <div class="col-md-3">
                                            <br>
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

    <script src="{{asset('js/SelectDepMun.js')}}"></script>
    <script src="{{asset('plantillaPlugins/js/jquery.smartWizard.min.js')}}"></script>
    <script src="{{asset('js\sweetalert2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <script src="{{asset('js/parsley.js')}}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="{{asset('js/enjoyhint.js')}}"></script>
    <script text="text/javascript">

   $(document).ready(function(){

        $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

       
        $('#FormEstudent').parsley();


        $('#btn_help').on('click',function(e){
            e.preventDefault();
            $('#accordionExample').removeClass('show');
            helpUser();
        });

        function helpUser(){

            var enjoyhint_instance = new EnjoyHint({});

            var enjoyhint_script_steps = [
                {
                    'next #txtNombres' :'Bienvenido al Apartado de Ingresa un Nuevo Usuario, Comienza Ingresando los Nombres del Estudiante',
                    'nextButton' : {className: 'myNext', text:'Siguiente'},
                    'skipButton' : {className: 'mySkip', text: 'Finalizar'},
                },
                {
                    'next #txtApellidos' : 'Como siguiente Paso Ingresa los Apellidos del Estudiante',
                    'nextButton' : {className: 'myNext', text: 'Siguiente'},
                    'skipButton' : {className: 'mySkip', text: 'Finalizar'},
                },

                {
                    'next #txtIdentificacion' : 'Ingresa el Numero de Identificacion del Estudiante',
                    'nextButton' : {className: 'myNext', text: 'Siguiente'},
                    'skipButton' : {className: 'mySkip', text: 'Finalizar'},
                },

                {
                    'next #txtCarnet' : 'Ingresa el Carne estudiantil del estudiante',
                    'nextButton' : {className: 'myNext', text: 'Siguiente'},
                    'skipButton' : {className: 'mySkip', text: 'Finalizar'},
                },

                {
                    'next #txtGenero' : 'Has clic en este campo y Selecciona una de las Opciones',
                    'nextButton' : {className: 'myNext',text:'Siguiente'},
                    'skipButton' : {className : 'mySkip', text: 'Finalizar'},
                },

                {
                    'next #txtCuarto' : 'Segun el Genero del Estudiante, te Presentaremos los Cuartos Disponibles',
                    
                    'skipButton' : {className: 'mySkip', text: 'Finalizar'},
                },


            ];

            //set script config
            enjoyhint_instance.set(enjoyhint_script_steps);

            //run Enjoyhint script
            enjoyhint_instance.run();

        }

        


       /*  $('#btn_Submit').click(function(event){

            event.preventDefault();

            $.ajax({

                type: 'POST',
                url: '/registroadd',
                data: $('#FormEstudent').serialize(),
                success: function (response){
                    console.log(response);
                    swal({
                        title: 'Informacion Guardada!',
                        timer: 1000,
                        type: 'success',
                        padding: '1em',
                    });
                },
                error: function(error){
                    console.log(error);
                    alert('data no saved');
                }
            });
        }); */

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'arrows',
            transitionEffect:'fade',
            showStepURLhash: false,
        });

           
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            // alert('you are on step' +stepNumber);
            if (stepNumber == 0) {
                alert('Hola');
                $('#InfoEstudiante').addClass('active');
                $('#InfoDomicilio').removeClass('active');
            }
            if (stepNumber == 1) {
                $('#InfoDomicilio').addClass('active');
                $('#InfoEstudiante').removeClass('active');
            }

            if (stePosition === 'firts') {
                $('#prev-btn').addClass('disabled');
            } else if (stePosition === 'final'){
                $('#next-btn').addClass('disabled');
            }
            else{
                $('#prev-btn').removeClass('disable');
                $('#next-btn').removeClass('disabled');
            }

        });

    

        $('#smartwizard').on('leaveStep', function(e, anchorObject, stepNumber,stepDirection){

            /* var formValid= $('#FormEstudent');

            formValid.parsley().validate();

            if (formValid.parsley().isValid()) {
                
                return true;
            }  */
        
            return true;
            

           

        });
    });         

    </script>

@endsection
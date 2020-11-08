@extends('Layout/layout')
@section('Style')
    <link rel="stylesheet" href="{{asset('css/InputHolder.css')}}">
    <link rel="stylesheet" href="{{asset('css/smart_wizard_theme_arrows.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/glyphicons.css')}}">
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('css/enjoyhint.css')}}"> 

@endsection

@section('Content')
    <br>
    <ul class="list-group" id="ErrorInfo">

    </ul>
  
    <div class="row ">
        <div  class="col-md-12 box">
            
            @if (Session::has('Message'))
                    <div class="alert alert-info alert-dismissible">{{ session::get('Message') }}
                        <button type="button" class="close " data-dismiss="alert">&times;</button>
                    </div>  
            @endif
               
        
            <form id="FormEstudent" accept-charset="utf-8">
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
                                                <input type="text" name="est_Carnet" id="txtCarnet" required="" data-parsley-required data-parsley-length='[9,9]'  data-parsley-trigger="keyup" >
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
                                                <select name="Cuar_ID" id="txtCuarto" class=" form-control" data-parsley-required="" data-parsley-min="1" data-parsley-error-message="Por favor selecciona un cuarto"></select>
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
                                                  <select name="Mun_ID" id="txt_Mun" class="form-control selectpicker" data-parsley-required="" data-parsley-min="1" data-parsley-error-message="Seleccione un Municipio Valido">
                                                    
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
                                                <input type="email" name="cor_Descripcion" id="txtCorreo" required="" data-parsley-type="email"  data-parsley-length="[8,70]"  data-parsley-trigger="keyup">
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
                                              <input type="text" name="dir_Descripcion" id="txt_Direccion" data-parsley-type="alphanum" required=""  data-parsley-trigger="keyup" >
                                              <label for="lblDireccion" class="col-sm-10 col-form-label">Direccion de habitacion del Estudiante</label>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <button id="btn_Submit" type="submit" class="btn btn-primary">Guardar Informacion</button>
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
    <script src="{{asset('js/jquery.smartWizard.min.js')}}"></script>
    <script src="{{asset('js\sweetalert2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
    <script src="{{asset('js/parsley.js')}}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="{{asset('js/enjoyhint.js')}}"></script>
    <script text="text/javascript">

   $(document).ready(function(){

       const inputs = document.querySelectorAll('input');
       const ulInfo = document.querySelector('#ErrorInfo');

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
        });


       

        $('#btn_Submit').click(function(event){
            
            event.preventDefault();
            const formValid= $('#FormEstudent');

            formValid.parsley().validate();
            
            insertStudent();
        
        });


        $('#FormEstudent').parsley();


        $('#btn_help').on('click',function(e){
            e.preventDefault();
            $('#accordionExample').removeClass('show');
            helpUser();
        }); // Evento para mostrar tour de ayuda al usuario

        const CreatHTMLError = (data) => {

            const liList = document.createElement('li');
            liList.innerHTML = `<span>${data}</span>`;
            
            ulInfo.className='list-group-item list-group-item-danger';

            ulInfo.append(liList);

        }


        const insertStudent = () => {
            
            $.ajax({
                    url: "{{route('student.store')}}",
                    method: 'POST',
                    data : $('#FormEstudent').serialize(),
                    dataType: 'json',
                    success: function(data){
                        console.log(data);                        
                        clearInputs();
                        $('#FormEstudent').parsley().reset();
                    },
                    error: function(error){
                        
                       
                        const {errors} = error.responseJSON;

                       if(ulInfo.firstChild){

                        while (ulInfo.firstChild) {
                            ulInfo.removeChild(ulInfo.firstChild);
                        } 
                       }
                        
                        Object.keys(errors).forEach(key => {
                            CreatHTMLError(errors[key][0]);
                        });
                        $('html, body').animate({scrollTop:0}, 'slow');

                        
                        
                    }   
                                 
            });
        } // funcion que permite realizar peticion post ajax, para ingresar un nuevo estudiante.

        

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

        } // funcion que configura la ayuda de usuario

        const clearInputs = () =>{ inputs.forEach( input => input.value = '')}; // Funcion para limpiar inputs

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

            /* const formValid= $('#FormEstudent');

            formValid.parsley().validate();

            if (formValid.parsley().isValid()) {
                
                return true;
            }  */
        
            return true;
            

           

        });
    });         

    </script>

@endsection
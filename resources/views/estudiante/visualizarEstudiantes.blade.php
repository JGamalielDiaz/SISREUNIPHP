@extends('Layout/layout')
@section('Style')
   {{-- <link rel="stylesheet" href="{{asset('plantillaPlugins/css/InputHolder.css')}}"> --}}
 {{-- <link rel="stylesheet" href="{{asset('css/parsley.css')}}"> --}}
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">
 <link rel="stylesheet" href="{{asset("fonts/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
 <link rel="stylesheet" href="{{asset('/bootstrap/glyphicons.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/datatable/datatables.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/datatable/custom_dt_html5.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/datatable/dt-global_style.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('Content')

<hr>
<section class="content">
  <div class="statbox widget box box-shadow">
    <div class="widget-header">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
          <h4>Informacion Extra</h4>
        </div>
      </div>
    </div>
    <div class="widget-content widget-content-area">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 id="womenIn"></h3>

              <p>Total de Mujeres</p>
            </div>
            <div class="icon">
              <i class="fas fa-female" style="color:#e743a3"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 id="menIn"><sup style="font-size: 20px"></sup></h3>

              <p>Total de Varones</p>
            </div>
            <div class="icon">
              <i class="fas fa-male" style="color:#4178ee"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </div>
</section>
<hr>


<div>
  <div class="content" >
    <div class="statbox widget box box-shadow">
      <div class="widget-header">
        <div class="row">
          <div class="col-xl-5 col-md-5 col-sm-5 col-5">
            <h4>Lista de Estudiantes en Sistema</h4>
          </div>
          
          </div>
        </div>
        <div id class="widget-content widget-content-area">
          <div class="row">
            <div class="col-md-4">
              <br>
            </div>
            <div class="col-md-4">
              <br>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-6">
                  <br>
                </div>
                <div class="col-md-6 col-6">
                  <button id="filterbtn" class="btn btn-primary btn-sm">Filtro avanzado</button>
                </div>
              </div>
            </div>
          </div>
          <div id="filterContent" style="display:none;">
            <div class="row">
              <div class="col-md-3">
                <br>
              </div>
              <div id="fil" class="col-md-6">
                <div class="content">
                  <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                      <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                          <h4>Filtro Avanzado</h4>
                        </div>
                      </div>
                    </div>
                    <div class="widget-content widget-content-area" >
                      <form id="filterForm"  class="form-horizontal" accept-charset="utf-8">
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label" for=""> filtrar Por Carne</label>
                              <div class="col-sm-12">
                                <select id="carnet" name="Carnet[]" class="form-control tagging" multiple="multiple">
                                  <option>seleccione un opcion</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label" for="">Filtrar por Carrera</label>
                              <div class="col-sm-12">
                                <select id="Car_ID" name="Car_ID[]" class="form-control tagging" multiple="multiple">
                                  @foreach ($carreras as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                  @endforeach
                                </select>
                              </div>
                              
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-12 col-form-label" for="">Filtrar por Genero</label>
                              <div class="col-sm-12">
                                <select id="Gen_ID" name="Gen_ID" class="form-control tagging" multiple="multiple">
                                   <option >seleccione un opcion</option>
                                  @foreach ($generos as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <br>
                          </div>
                          <div class="col-md-4">
                            <button id="saveFilter" class="btn btn-primary btn-sm">Aplicar Filtro</button>
                          </div>
                          <div class="col-md-4">
                            <br>
                          </div>
                        </div>
                      </form>          
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <br>
              </div>
            </div>
            
          </div>
          <div id="tblContent">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12">
                
                  <table class="table table-hover non-hover " id="EstuList" style="width:100%">
                    
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nombres</th>
                              <th>Apellidos </th>
                              <th>Identificacion</th>
                              <th>Carnet</th>
                              <th class="no-exportar">Acciones</th>
                              {{-- <th class="no-exportar">Eliminar</th> --}}
                          </tr>
                      </thead>
                  </table>
              </div>
            </div>
                
          </div>
        </div>
      </div>
    </div>
  </div>

    
@endsection

@section('Scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script> --}}
    {{-- <script src="{{asset('js/parsley.js')}}"></script> --}}
    {{-- <script src="{{asset('js/es.js')}}"></script> --}}
    <script src="{{asset('js/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('js/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/button-ext/jszip.min.js')}}"></script>    
    <script src="{{asset('js/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/button-ext/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
    <script src="{{asset('js/visualizarEstudiante.js')}}"></script>
    
    
  <script>
    $(document).ready(function() {

      visualizarEstudiante.init();


      $(".tagging").select2({
        placeholder: "Has una Eleccion",
        tags: true,
        minimumResultsForSearch: -1,
        maximumSelectionLength: 3
      });

    });
  </script>
@endsection
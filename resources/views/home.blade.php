@extends('Layout.layout')

@section('Style')
    <link rel="stylesheet" href="{{asset("fonts/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset('plugins/apex/apexcharts.css')}}">
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

<section>
  <div class="row">
    <div class="col-md-6">
      <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
          <div class="row">
            <div class="col-md-6">
              <div id="pieCarrera"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('Scripts')

<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
{{-- <script src="{{asset('plugins/apex/custom-apexcharts.min.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
          const pieCarrera = document.querySelector('#pieCarrera');
          let womenCount = document.querySelector('#womenIn');
          let menCount = document.querySelector('#menIn');
          let labels =[];
          let countCarreras = [];

          $.ajaxSetup({
              headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
          });

          const getGenderToView = ()=>{

              $.ajax({
                  url: "api/getGen",
                  method: 'GET',
                  success: function({women,men}){
                  womenCount.innerHTML = women;
                  menCount.innerHTML = men                      
                  },

              });
          }

          getGenderToView();

          const graficCarrera = ()=>{

            $.ajax({
              url: "{{route('carrerInfo')}}",
              type: 'GET',
              success: function(data){

                console.log(data);

                data.map(({car_Nombre, total})=>{
                  labels.push(car_Nombre);
                  countCarreras.push(total);
                });
                const optionsChart = {
                  series: countCarreras,
                  chart: {
                    width :480,
                    type: 'pie'
                  },
                  title: {
                    text: 'CANTIDAD DE ESTUDIANTES POR CARREA',
                    align: 'center'
                    },
                  legend: {
                      position: 'top'
                    },
                  colors: ['#3498db', '#ff6d42', '#89cb55', '#f24949','#7d3c98'],
                  labels: labels,
                  responsive: [{
                      breakpoint: 1000,
                      options: {
                        chart: {
                          width: 350
                        },
                        legend: {
                          position: 'left'
                        }
                      }
                    }]
                };

                const chartApex= new ApexCharts(pieCarrera,optionsChart);

                chartApex.render();

              },
              errors: function(error){

                consonle.log(error);
              }
            });

          }

          
          graficCarrera();
         
        })
    </script>
@endsection

@extends('Layout.layout')
@section('Content')

<div class="card" style="margin-top: 2%">
    <h5 class="card-header bg-primary">Verificar Cumplimiento de Aseo.</h5>
    <div class="card-body">
      <h5 class="card-title">Seleccione el estado del Cumplimiento</h5>
      
      <div class="col-md-12">
          <div class="row">
          </div>
      </div>
      <div class="col-md-12">
       <div class="row" style="margin-top: 2%">
           <div class="col-md-2"> <label for="" style="color: black">Nombre Completo</label> </div>
            <div class="col-md-4">    
            @foreach ($detalles as $dt)
             <label for=""> {{ $dt->per_Nombre }} </label>      
            </div>
            <div class="col-md-2"><label for="" style="color: black">Apellidos</label></div>
            <div class="col-md-4">
                <label for="">{{ $dt->per_Apellido }}</label>
            </div>            
       </div>
       <div class="row" style="margin-top: 2%">
        <div class="col-md-2"> <label for="" style="color: black">Carrera</label> </div>
         <div class="col-md-4">
             <label for="">{{ $dt->car_Nombre }}</label>
         </div>
         <div class="col-md-2"><label for="" style="color: black">Recinto</label></div>
         <div class="col-md-4">
             <label for="">{{ $dt->rec_Descripcion }}</label>
         </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-md-2"> <label for="" style="color: black">Numero Cuarto</label> </div>
         <div class="col-md-4">
             <label for="" class="badge badge-info" >{{ $dt->cuar_Numero }}</label>
         </div>
         <div class="col-md-2"><label for="" style="color: black">Carnè</label></div>
         <div class="col-md-4">
             <label for="" class="badge badge-info">{{ $dt->est_Carnet }}</label>
         </div>
    </div>
    <div class="row" style="margin-top: 2%">
        <div class="col-md-2"><label for="" style="color: black">Fecha Actual</label></div>
        <div class="col-md-4">
            <label for="">{{ $hoy }}</label>
        </div> 
        <div class="col-md-2">
            <label for="" style="color: black"> <p></p> Cumplimiento</label>
        </div> 
        <div class="col-md-3">
            <select id="inputState" onchange="verificacionRol(event)" class="form-control">
                @foreach ($detalles as $estado)
                 @if ($estado->hisAseo_Cumple==1)
                 <option selected value="1" >Realizado</option>
                 <option value="2">No Realizado</option>    
                 @elseif($estado->hisAseo_Cumple==2)
                 <option value="1" >Realizado</option>
                 <option value="2" selected>No Realizado</option> 
                 @elseif($estado->hisAseo_Cumple==null)
                 <option value="1" >Realizado</option>
                 <option value="2">No Realizado</option> 
                 @endif   
                 @endforeach
              </select>
        </div>
        @endforeach
    </div>
    <div class="col-md-12" style="margin-top: 2%">           
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><h3  style="color: black">Observaciónes <i class="fas fa-binoculars"></i></h3></label>
                        <textarea class="form-control" placeholder="Ingrese Observaciónes, del seguimiento del Rol de Aseo..." id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                <div class="col-md-2"></div>
            </div>
          </div>
    </div>      
    </div>
@endSection


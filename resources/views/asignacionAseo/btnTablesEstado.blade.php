
@if ($hisAseo_Cumple==1)
 <a href="{{url("Cumplimiento", $RolAseo_ID ) }}" ><span class="badge badge-success">Realizado!</span></a>
@elseif($hisAseo_Cumple==2)

<a href="{{url("Cumplimiento", $RolAseo_ID ) }}"  ><span class="badge badge-danger">No Realizado!</span></a>             
@elseif($hisAseo_Cumple==null)    
<a href="{{url("Cumplimiento", $RolAseo_ID ) }}"  ><span class="badge badge-pill badge-warning">Pendiente...</span></a> 
@endif 
 

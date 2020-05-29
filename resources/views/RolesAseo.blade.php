@extends('Layout/layout')
@section('Style')
    
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="LayoutAssets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="LayoutAssets/plugins/fullcalendar/custom-fullcalendar.advance.css" rel="stylesheet" type="text/css" />
    <link href="LayoutAssets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="LayoutAssets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="LayoutAssets/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLE -->
@endsection
@section('Content')
<div class="row layout-top-spacing" id="cancel-row">
     <div class="col-xl-12 col-lg-12 col-md-12">
         <div class="statbox widget box box-shadow">
             <div class="widget-content widget-content-area">
                 <h2>Calendario de Asignaciones </h2>
                 <div class="calendar-upper-section">
                     <div class="row">
                         <div class="col-md-8 col-12">
                             <div class="labels">
                                 <p class="label label-primary">Work</p>
                                 <p class="label label-warning">Travel</p>
                                 <p class="label label-success">Personal</p>
                                 <p class="label label-danger">Important</p>
                             </div>
                         </div>                                                
                         <div class="col-md-4 col-12">
                             <form action="javascript:void(0);" class="form-horizontal mt-md-0 mt-3 text-md-right text-center">
                                 <button id="myBtn" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Roles de Aseo</button>
                             </form>
                         </div>
                     </div>
                 </div>
              
                 <div id="calendar"></div>
             </div>
         </div>
     </div>

     <!-- The Modal -->
     <div id="addEventsModal" class="modal animated fadeIn">

         <div class="modal-dialog modal-dialog-centered">
             
             <!-- Modal content -->
             <div class="modal-content">

                 <div class="modal-body">

                     <span class="close">&times;</span>

                     <div class="add-edit-event-box">
                        <div class="add-edit-event-content">
                             <h5 class="add-event-title modal-title"><h5> <strong>Aseo Para el Cuarto 15</strong></h5>
                             <h5 class="edit-event-title modal-title"></h5>
                             <div>
                                 <table class="table table-bordered" id="table_data">
                                     <tr>
                                        <thead>
                                            <tr>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Tipo Aseo</th>
                                                <th>Cumplimiento</th>
                                            </tr>
                                            
                                      </thead>
                                     </tr>
                                  
                                     
                                 <tbody>
                                     
                                 </tbody>
                                 </table>
                             </div>
                           <!--  
                             <form class="">
                          
                          -->
                     </div>
                   
                 </div>

                 <div class="modal-footer">
                     <button id="discard" class="btn" data-dismiss="modal">Discard</button>
                     <button id="add-e" class="btn">Add Task</button>
                     <button id="edit-event" class="btn">Save</button>
                 </div>

             </div>

         </div>

     </div>
     </div>
@endsection
@section('Scripts')



     <!-- BEGIN PAGE LEVEL SCRIPTS -->
     
     
    
     <script src="{{asset('LayoutAssets/plugins/fullcalendar/moment.min.js')}}"></script>
     <script src="{{asset('LayoutAssets/plugins/flatpickr/flatpickr.js')}}"></script>
     <script src="{{asset('LayoutAssets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>


     {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script> --}}
    <script src="{{asset('js/parsley.js')}}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="LayoutAssets/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="LayoutAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="LayoutAssets/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="LayoutAssets/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="LayoutAssets/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
     <script>
         $(document).ready(function () {
            FillDataTable();
            function FillDataTable(){
                //DATATABLE
                $('#table_data').DataTable({
                    // dom:"<'row'<'col-md-6'l>>",
                    dom: '<"row"<"col-md-6"l>><"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>>',
                    buttons: {
                        buttons: [
                            { extend: 'copy', className: 'btn' },
                            { extend: 'csv', className: 'btn' },
                            { extend: 'excel', className: 'btn' },
                            { extend: 'print', className: 'btn' }
                        ]
                    },
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                    },
                    "pageLength": 20,
                    "lengthMenu": [[10, 20, 50,-1],[10, 20, 50,'All']],
                    "serverSide": true,
                    destroy:true,
                   
                    "ajax":"{{url('api/RolesPendientes')}}",
                    "columns":[
                        {data: 'per_Nombre'},
                        {data: 'per_Apellido'},
                        {data:'tipoAseo_Nombre'},
                       { data: 'btn',orderable:false, searchable:false}

                    
                    ]
                });  
            }
         });
     </script>
     
     <!-- END PAGE LEVEL SCRIPTS -->
     
     <!--  BEGIN CUSTOM SCRIPTS FILE  -->
     <script src="{{asset('LayoutAssets/plugins/fullcalendar/custom-fullcalendar.advance.js')}}"></script>
     
     <!--  END CUSTOM SCRIPTS FILE  -->
    @endsection

   

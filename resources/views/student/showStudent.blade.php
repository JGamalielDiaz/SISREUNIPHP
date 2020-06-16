@extends('Layout/layout')
@section('Style')
   {{-- <link rel="stylesheet" href="{{asset('plantillaPlugins/css/InputHolder.css')}}"> --}}
 <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
 <link rel="stylesheet" href="{{asset('LayoutAssets/bootstrap/css/glyphicons.css')}}">
 <link rel="stylesheet" type="text/css" href="LayoutAssets/plugins/table/datatable/datatables.css">
 <link rel="stylesheet" type="text/css" href="LayoutAssets/plugins/table/datatable/custom_dt_html5.css">
 <link rel="stylesheet" type="text/css" href="LayoutAssets/plugins/table/datatable/dt-global_style.css">
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('Content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12"><br>
            
             <table class="table table-hover non-hover" id="EstuList" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos </th>
                        <th>Identificacion</th>
                        <th>Carnet</th>
                        <th class="no-exportar">Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>
    
    <!-- Modal -->

  

    <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-sm-10" id="exampleModalLabel">Actualizar Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="studenEdit" accept-charset="utf-8">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lblCarnet" class="col-form-label col-sm-10">Ingrese Carnet Estudiantil</label>
                                    <div class="col-md-8">
                                        <input type="text" name="est_Carnet" id="txtCarnet" class="form-control">
                                    </div>
                                    
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lblCarnet" class="col-form-label col-sm-10">Ingrese Identificacion del Estudiante</label>
                                    <input type="text" name="per_Identificacion" id="txtCedula" class="form-control">
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" id="btnEdit">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('Scripts')
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
        $(document).ready(function() {

            let id;
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            FillDataTable();
            //UPDATE DATATABLE

            $(document).on('click','.edit',function(e){
                e.preventDefault();
                id= $(this).attr('id');

                $.ajax({
                    url: "{{route('student.getData')}}",
                    method: 'GET',
                    data: {id:id},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);

                        let dataAccess= data[0];
                        
                        $('#txtCarnet').val(dataAccess.est_Carnet);
                        $('#txtCedula').val(dataAccess.per_Identificacion);
                        $('#ModalUpdate').modal('show');
                    },
                    error: function(error){
                        console.log(error);
                    }                
                });

            });

            //SaveUpdate
            $('#btnEdit').click(function(e){

                e.preventDefault();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              
                $.ajax({
                    
                    url: "student/update/"+id,
                    method: 'POST',
                    data:$('#studenEdit').serialize(),
                    dataType:'json',
                    success: function(response){
                        console.log(response);
                        FillDataTable();
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });

            

            function FillDataTable(){
                //DATATABLE
                $('#EstuList').DataTable({
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
                    "ajax":"{{url('api/EstuList')}}",
                    
                    "columns":[
                        {data: 'Per_ID'},
                        {data: 'per_Nombre'},
                        {data : 'per_Apellido'},
                        {data: 'per_Identificacion'},
                        {data: 'est_Carnet'},
                        {data: 'btn',orderable:false, searchable:false}
                        
                    ]
                });  

            }
        });
    </script>
@endsection
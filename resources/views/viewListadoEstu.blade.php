@extends('Layout/layout')
@section('Style')
   {{-- <link rel="stylesheet" href="{{asset('plantillaPlugins/css/InputHolder.css')}}"> --}}
@endsection
@section('Content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12"><br>
            
             <table class="table table-hover" id="EstuList" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos </th>
                        <th>Identificacion</th>
                        <th>Carnet</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>
    
    <!-- Modal -->

    <div class="row">
        <div class="col-xs-1-12 box">
             <form action="" role="form" method="post">
                 <div>
                     <div>
                        <div class="row">
                            <div class="col-md-1">
                                <br>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <input type="text" name="per_Apellido" class="" id="txtApellidos" required="">
                                    <label for="lblApellidos" class="">Apellidos del Estudiante</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                            </div>
                        </div>
                     </div>
                 </div>
             </form>
        </div>
    </div>

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
                    <form action="" role="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lblCarnet" class="col-form-label col-sm-10">Ingrese Carnet Estudiantil</label>
                                    <input type="text" name="est_Carnet" id="txtCarnet" class="form-control" placeholder="Carnet Estudiantil">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lblCarnet" class="col-form-label col-sm-10">Ingrese Identificacion del Estudiante</label>
                                    <input type="text" name="per_Identificacion" id="txtCedula" class="form-control" placeholder="Identificacion">
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('Scripts')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('LayoutAssets\assets\js\jquery.geturlparam.js')}}"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            //UPDATE DATATABLE

            $(document).on('click','.edit',function(e){
                e.preventDefault();
                let id= $(this).attr('id');
                

                $.ajax({

                    url: "{{route('student.getdata')}}",
                    method: 'GET',
                    data: {id:id},
                    dataType: 'json',
                    success: function(data){
                        console.log(data);

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

            $('#btn_Submit').click(function(e){

                e.preventDefault();

                $.ajax({
                    url: "{{route('student.update')}}:",
                    method: 'POST',
                    data:{request:$('#editForm').serialize(),id:id},
                    dataType:'json',
                    success: function(response){
                        console.log(response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });


            //DATATABLE
            $('#EstuList').DataTable({
                
                "serverSide": true,
                "ajax":"{{url('api/EstuList')}}",
                "pageLength": 20,
                "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
                "columns":[
                    {data: 'Per_ID'},
                    {data: 'per_Nombre'},
                    {data : 'per_Apellido'},
                    {data: 'per_Identificacion'},
                    {data: 'est_Carnet'},
                    {data: 'btn',orderable:false, searchable:false}
                    
                ]
            });  
        });
    </script>
@endsection
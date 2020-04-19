@extends('plantilla')

@section('content')
    <table id="EstuList" class="table" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos </th>
                <th>Identificacion</th>
                <th>Carnet</th>
            </tr>
        </thead>
    </table>
@endsection

@section('Scripts')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
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
                    {data: 'est_Carnet'}
                    
                ]
            });
        } );
    </script>
@endsection
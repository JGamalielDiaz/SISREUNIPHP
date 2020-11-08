@extends('Layout.layout')
 @section('Content')
 <div class="card-primary">
        <div class="card-body">
            @if (Session::has('info'))
             <div class="alert alert-info">{{ session::get('info') }}</div>
            @endif
            <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                         <td>{{$user->id}}</td>
                            <td>{{$user->per_Nombre}}</td>
                         <td>{{$user->per_Apellido}}</td>
                         @can('users.edit')
                            <td><a href="{{route('users.edit',$user->id)}}" class="edit btn btn-primary">Editar</a></td>
                         @endcan
                         
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>

 @endsection
    
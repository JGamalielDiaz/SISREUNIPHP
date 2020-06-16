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
                            <th>Roles</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->description}}</td>\
                                @can('roles.edit')
                                    <td><a href="{{route('roles.edit',$role->id)}}" class="edit btn btn-primary">Editar</a></td>
                                @endcan
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

 @endsection
    
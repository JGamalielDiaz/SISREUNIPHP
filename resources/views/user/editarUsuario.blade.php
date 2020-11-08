@extends('Layout/layout')
    @section('Content')
        <div class="row">
            <div class="col-md-12">
                <div class="card-primary">
                    <div class="card-body">
                        {!! Form::model($user,['route' => ['users.update',$user->id],'method'=> 'PUT'])!!}
    
                        @include('user.form')
    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

    @endsection
 



@extends('Layout.layout')
  @section('Content')
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-primary">
                        <div class="card-body">
                            {!! Form::model($role,['route' => ['roles.update',$role->id],'method'=> 'PUT'])!!}

                                @include('role.form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
  @endsection
  
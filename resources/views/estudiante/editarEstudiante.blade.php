@extends('Layout/layout')
    @section('Style')
    <link rel="stylesheet" href="{{asset('/bootstrap/glyphicons.css')}}">
    @endsection
    @section('Content')
        <div class="container">
            @if ($errors->any())
                <ul>
                 @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                 @endforeach
                </ul> --}}
                
            @endif
            <div class="row">
                <div class="col-md-8">
                    {!!Form::model($persona,['route'=> ['student.update',$persona->Per_ID]])!!}
                        @include('estudiante.form')
                    {!!Form::close() !!}
                </div>
            </div>  
        </div>  
    @endsection
@extends('dash.index')
@section('title','Editar Roles')
@section('contenido')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!--@if ($errors->any())
                            <div class="alert alert-dark slert-dismissible fade show" role="alert">
                                <strong>!Revise los campos¡</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif-->

                        {!! Form::open(array('route'=>'roles.store','method'=>"POST")) !!}
                            <div class="row">
                                <div clas="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del Rol:</label>
                                    {!! Form::text('name',null,array('class'=>'form-control')) !!}
                                    @error('name')
                                       <span style='color:red;'>{{$message}}</span> 
                                    @enderror
                                    </div>
                                </div>
                                <div clas="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este Rol: </label>
                                        <br>
                                        @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]',$value->id,false,array('class'=>'name')) }}
                                            {{$value->name}}
                                        </label>
                                        <br>
                                        @endforeach
                                        @error('permission')
                                       <span style='color:red;'>{{$message}}</span> 
                                        @enderror
                                    </div>
                                </div> 
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button> 
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

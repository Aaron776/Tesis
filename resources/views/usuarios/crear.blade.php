@extends('dash.index')
@section('title','Crear Usuarios')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <!--@if ($errors->any())
                                <div class="alert alert-dark slert-dismissible fade show" role="alert">
                                    <strong>!Revise los Campos¡ </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif-->
                            

                            {!! Form::open(array('route'=>'usuarios.store','method'=>"POST")) !!}
                                <div class="row">
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="cedula">Cédula: </label>
                                            {!! Form::text('cedula',null,array('class'=>'form-control')) !!}
                                            @error('cedula')
                                            <span style='color:red;'>{{$message}}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre Completo: </label>
                                            {!! Form::text('name',null,array('class'=>'form-control')) !!}
                                            @error('name')
                                            <span style='color:red;'>{{$message}}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Celular: </label>
                                            {!! Form::text('telefono',null,array('class'=>'form-control')) !!}
                                        </div>
                                        @error('telefono')
                                        <span style='color:red;'>{{$message}}</span> 
                                        @enderror
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email: </label>
                                            {!! Form::text('email',null,array('class'=>'form-control')) !!}
                                            @error('email')
                                            <span style='color:red;'>{{$message}}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Contraseña: </label>
                                            {!! Form::password('password',array('class'=>'form-control')) !!}
                                            @error('password')
                                            <span style='color:red;'>{{$message}}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Contraseña: </label>
                                            {!! Form::password('confirm-password',array('class'=>'form-control')) !!}
                                            @error('confirm-password')
                                            <span style='color:red;'>{{$message}}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="roles">Rol: </label>
                                            {!! Form::select('roles[]',$roles,[],array('class'=>'form-control')) !!}
                                            @error('roles')
                                              <span style="color:red;">{{$message}}</span>  
                                            @enderror
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

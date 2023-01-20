@extends('dash.index')
@section('title','Editar Usuarios')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark slert-dismissible fade show" role="alert">
                                    <strong>!Revise los campos¡</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($user,['method'=>"PUT",'route'=>['usuarios.update',$user->id]]) !!}
                                <div class="row">
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="cedula">Cédula: </label>
                                            {!! Form::text('cedula',null,array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            {!! Form::text('name',null,array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono: </label>
                                            {!! Form::text('telefono',null,array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            {!! Form::text('email',null,array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            {!! Form::password('password',array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Contraseña</label>
                                            {!! Form::password('confirm-password',array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div clas="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="roles">Roles</label>
                                            {!! Form::select('roles[]',$roles,$userRole,array('class'=>'form-control')) !!}
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



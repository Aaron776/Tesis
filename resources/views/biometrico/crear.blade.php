@extends('dash.index')
@section('title','Biometrico')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())

                                <div class="alert alert-dark slert-dismissible fade show" role="alert">
                                    <strong>!Revise los Campos¡ </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                {{Session::get('success')}} 
                                </div>
                            @endif

                           {!! Form::open(['route'=>'biometrico.store']) !!}
                           
                            <div class="form-group">
                                <label for="roles">Materia</label>
                                {!! Form::select('id_distributivo',$materia,[],array('class'=>'form-control')) !!}
                                @error('id_distributivo')
                                  <span style="color:red;">{{$message}}</span>  
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label(null, 'Fecha: ', null) !!}
                                {!! Form::date('fecha_registro', null, ['class'=>'form-control','min'=>'2023-01-01']) !!}
                                @error('fecha_registro')
                                 <span style="color:red;">{{$message}}</span>  
                                @enderror
                            </div>

                            <div class="form-group">
                              {!! Form::label(null, 'Hora de entrada: ', null) !!}
                              {!! Form::time('hora_entrada', null, ['class'=>'form-control']) !!}
                              @error('hora_entrada')
                                  <span style="color:red;">{{$message}}</span>  
                              @enderror
                           </div>

                           <div class="form-group">
                            {!! Form::label(null, 'Hora de Salida: ', null) !!}
                            {!! Form::time('hora_salida', null, ['class'=>'form-control']) !!}
                            @error('hora_salida')
                                    <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>
                           <div class="form-group">
                            <p class="font-weight-bold">Situación: </p>
                                <label class="mr-2">
                                    {!! Form::radio('estado', 'Atrasado') !!}
                                    Atrasado
                                </label>
                                <label class="mr-2">
                                    {!! Form::radio('estado', 'No dio clases') !!}
                                    No dio clases
                                </label>
                                <label class="mr-2">
                                    {!! Form::radio('estado', 'Esta todo bien') !!}
                                    Está todo bien
                                </label>

                                <div class="form-group">
                                    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
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
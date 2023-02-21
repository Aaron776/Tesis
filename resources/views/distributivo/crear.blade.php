@extends('dash.index')
@section('title','Crear Distributivos')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                {{Session::get('success')}} 
                                </div>
                            @endif

                           {!! Form::open(['route'=>'distributivo.store']) !!}
                           
                           <div class="form-group"> 
                            {!! Form::label(null, 'Docente: ') !!}
                            {!! Form::select('id_usuario', $usuarios, null, ['class'=>'form-control']) !!}
                            @error('id_docente')
                                <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>

                           <div class="form-group"> 
                            {!! Form::label(null, 'Periodo Académico: ') !!}
                            {!! Form::select('id_periodo', $periodos, null, ['class'=>'form-control']) !!}
                            @error('id_periodo')
                                <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>

                           <div class="form-group"> 
                            {!! Form::label(null, 'Asignatura: ') !!}
                            {!! Form::select('id_materia', $materias, null, ['class'=>'form-control']) !!}
                            @error('id_materia')
                                <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Día: ', null) !!}
                               {!! Form::text('dia', null, ['class'=>'form-control']) !!}
                                @error('dia')
                                 <span style="color:red;">{{$message}}</span>  
                                @enderror
                            </div>

                            <div class="form-group">
                              {!! Form::label(null, 'Hora de Inicio Clase: ', null) !!}
                              {!! Form::time('hora_inicio', null, ['class'=>'form-control']) !!}
                              @error('hora_inicio')
                                  <span style="color:red;">{{$message}}</span>  
                              @enderror
                           </div>

                           <div class="form-group">
                            {!! Form::label(null, 'Hora de Fin Clase: ', null) !!}
                            {!! Form::time('hora_fin', null, ['class'=>'form-control']) !!}
                            @error('hora_fin')
                                    <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>
                           
                           <div class="form-group">
                            {!! Form::label(null, 'Modalidad: ', null) !!}
                            {!! Form::text('tipo_clase', null, ['class'=>'form-control']) !!}
                           </div>

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
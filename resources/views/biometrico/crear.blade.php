@extends('dash.index')
@section('title','Biometrico')
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

                           {!! Form::open(['route'=>'biometrico.store']) !!}
                           
        
                           <div class="form-group"> 
                            <label>Asignatura: </label>   
                            <select name="id_distributivo" class="form-control">
                                @foreach ($materia as $item)
                                    <option value="{{$item->id}}">{{$item->materias->nombre}} ({{$item->dia}})</option>
                                @endforeach 
                            </select>
                            @error('id_distributivo')
                                <span style="color:red;">{{$message}}</span>  
                            @enderror
                           </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Fecha: ', null) !!}
                                {!! Form::date('fecha_registro', null, ['class'=>'form-control','min'=>'2023-02-01']) !!}
                                @error('fecha_registro')
                                 <span style="color:red;">{{$message}}</span>  
                                @enderror
                            </div>

                            <div class="form-group">
                              {!! Form::label(null, 'Hora de Entrada: ', null) !!}
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
                                        {!! Form::radio('estado', 'Está todo bien') !!}
                                        Está todo bien
                                    </label>
                                    <div class="form-group">
                                        @error('estado')
                                            <span style="color:red;">{{$message}}</span>  
                                        @enderror
                                    </div>
                            </div>
        
                            <div class="form-group">
                                {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                            </div>
                           {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@extends('dash.index')
@section('title','Biometrico')
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="section-body">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
            @can('marcar-biometrico')
              <div class="card-header">
                  <h2 style='text-align:center;'> Registro de Biométrico</h2>
                
              </div>
            @endcan
              <div class="card-body">
                @can('marcar-biometrico')
                  <div class="card-header">
                      <a href="{{route('biometricos.create')}}" class='btn btn-primary'>Registrar</a>
                  </div>
                @endcan

                  @can('ver-biometrico')
                  <table class="table table-striped table-hover" id="biometricos">
                    <thead>
                      <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Docente</th>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Día</th>
                        <th scope="col">Modalidad</th>
                        <th scope="col">Hora Llegada</th>
                        <th scope="col">Hora Salida</th>
                        <th scope="col">Estado</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($biometricos as $index)
                      <tr>
                        <th>{{$index->distributivos->usuarios->cedula}}</th>
                        <th>{{$index->distributivos->usuarios->name}}</th>
                        <th>{{$index->distributivos->materia}}</th>
                        <th>{{$index->distributivos->dia}}</th>
                        <th>{{$index->distributivos->tipo_clase}}</th>
                        <th>{{$index->hora_entrada}}</th>
                        <th>{{$index->hora_salida}}</th>
                        <th>{{$index->estado}}</th>
                        <th>
                          @can('generar-reporte')
                            <a href="{{route('reportes.pdf',$index)}}" class="btn btn-primary">Reporte</a>
                          @endcan 
                        </th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table> 
                  @endcan
                  </div>
                </div>
            </div>
        </div>
    </div> 
  @endsection

  @section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
  <script>
      $(document).ready(function(){
          $('#biometricos').DataTable(
              {
                  "lengthMenu":[[5,10,50,-1],[5,10,50,"Todos"]],
                  "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontro lo que estas buscando",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search":"Buscar:",
                    "paginate":{
                      "next":"Siguiente",
                      "previous":"Anterior"
                    }
                }
              }
          );
      })
  </script>
@endsection

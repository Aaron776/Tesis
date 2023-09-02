@extends('dash.index')
@section('title','Distributivos')
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="section-body">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <table class="table table-striped table-hover" id="distributivos">
                    <thead>
                      <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Día</th>
                        <th scope="col">Modalidad</th>
                      </tr>
                    </thead>
                    <tbody>
                  
                      @foreach($distributivos as $index) 
                      <tr>
                        <th>{{$index->usuarios->cedula}}</th>
                        <th>{{$index->usuarios->name}}</th>
                        <th>{{$index->materias->nombre}}</th>
                        <th>{{$index->dia}}</th>
                        <th>{{$index->tipo_clase}}</th>
                        <td>
                            <a href="{{route('biometrico.index',$index->id)}}" class="btn btn-info">Ver Biométrico</a>
                        </td>
                      </tr>
                      @endforeach 
                    </tbody>
                  </table> 
                  </div>
                </div>
            </div>
        </div>
    </div> 
  @endsection

  @section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
  <script>
      $(document).ready(function(){
        if ($.fn.DataTable.isDataTable('#distributivos')) {
            $('#distributivos').DataTable().destroy();
          }
          $('#distributivos').DataTable(
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
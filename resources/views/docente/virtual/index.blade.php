@extends('dash.index')
@section('title','Docentes Invitados Virtuales')
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="section-body">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <table class="table table-striped table-hover" id="docentes_virtuales">
                    <thead>
                      <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Modalidad</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $index)
                          @if($index->tipo_clase=="Virtual")
                            <tr>
                              <th>{{$index->usuarios->cedula}}</th>
                              <th>{{$index->usuarios->name}}</th>
                              <th>{{$index->usuarios->telefono}}</th>
                              <td>{{$index->usuarios->email}}</td>
                              <td>{{$index->materia}}</td>
                              <td>{{$index->tipo_clase}}</td>
                            </tr>
                            @endif
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
  <script>
      $(document).ready(function(){
          $('#docentes_virtuales').DataTable(
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
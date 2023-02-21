@extends('dash.index')
@section('title','Docentes Invitados')
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="section-body">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <table class="table table-striped table-hover" id="docentes">
                    <thead>
                      <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $index)
                        @foreach($index->getRoleNames() as $rolName)
                          @if($rolName=='Docente Invitado')
                            <tr>
                              <th>{{$index->cedula}}</th>
                              <th>{{$index->name}}</th>
                              <th>{{$index->telefono}}</th>
                              <td>{{$index->email}}</td>
                              <td>
                                <a href="{{route('distributivo.index',$index->id)}}" class="btn btn-primary">Ver Distributivos</a>
                              </td>
                            </tr>
                            @endif
                        @endforeach   
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
          $('#docentes').DataTable(
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
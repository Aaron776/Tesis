@extends('dash.index')
@section('title','Usuarios')
@section('css')
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
<div class="section-body">
  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                @can('crear-usuario')
                  <a class="btn btn-primary" href="{{route('usuarios.create')}}">Agregar Usuario </a>
                  <br>
                  <br>
                @endcan
                @if(Session::has('success'))
                    <div class="alert alert-success text-center">
                      {{Session::get('success')}} 
                    </div>
                  @endif

                  @if(Session::has('danger'))
                    <div class="alert alert-danger text-center">
                      {{Session::get('danger')}} 
                    </div>
                  @endif

                <table class="table table-striped table-hover" id="usuarios">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $index)
                              @foreach($index->getRoleNames() as $rolName)
                                @if($rolName=="Docente Invitado")
                          <tr>
                            <th>{{$index->name}}</th>
                            <td>{{$index->email}}</td>
                            <td>
                                @if(!empty($index->getRoleNames()))
                                    @foreach($index->getRoleNames() as $rolName)
                                        <h5><span class="badge badge-dark" style="color:#fff;">{{$rolName}}</span></h5>
                                     @endforeach
                                @endif
                            </td>
                            <td>
                                @can('editar-usuario')
                                  <a class="btn btn-warning" href="{{route('usuarios.edit',$index->id)}}">Editar</a>
                                @endcan

                                {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy',$index->id], 'style'=>'display:inline']) !!}
                                  @can('editar-usuario')
                                    {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                  @endcan
                                {!! Form::close() !!}
                            </td>
                          </tr>
                              @endif
                            @endforeach
                          @endforeach
                        </tbody>
                      </table>
                      <div class="pagination justify-content-end"> <!--Paginacion-->
                        {!! $usuarios->links() !!}
                    </div> 
                    @section('js')
                      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                      <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
                      <script>
                          $(document).ready(function(){
                              $('#usuarios').DataTable(
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
                  </div>
                </div>
            </div>
        </div>
    </div> 
  @endsection

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
            @can('crear-usuario')
                  <div class="card-header">
                    <a class="btn btn-primary" href="{{route('usuarios.create')}}">Agregar Usuario </a>
                  </div>
            @endcan
              <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert">
                      {{Session::get('success')}} 
                    </div>
                  @endif

                  @if(Session::has('danger'))
                    <div class="alert alert-danger text-center" role="alert">
                      {{Session::get('danger')}} 
                    </div>
                  @endif

                <table class="table table-striped table-hover" id="usuarios">
                        <thead>
                          <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $index)
                          <tr>
                            <th>{{$index->cedula}}</th>
                            <th>{{$index->name}}</th>
                            <th>{{$index->telefono}}</th>
                            <td>{{$index->email}}</td>
                            <td>
                                @if(!empty($index->getRoleNames()))
                                    @foreach($index->getRoleNames() as $rolName)
                                        <h5><span class="badge badge-dark" style="color:#fff;">{{$rolName}}</span></h5>
                                     @endforeach
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('usuarios.destroy', $index->id) }}" method="POST" class="formEliminar">
                                  @csrf
                                  @method('DELETE')
                            
                                  @can('editar-usuario')
                                    <a class="btn btn-warning" href="{{route('usuarios.edit',$index->id)}}">Editar</a>
                                  @endcan
                                  @can('borrar-usuario')
                                    <button type="submit" class="btn btn-danger" class="formEliminar">Borrar</button>
                                  @endcan 
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="pagination justify-content-end"> <!--Paginacion-->
                        {!! $usuarios->links() !!}
                    </div> 
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
          if ($.fn.DataTable.isDataTable('#usuarios')) {
            $('#usuarios').DataTable().destroy();
          }
          
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
  <script>

    $('.formEliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
        title: '¿Está seguro que desea eliminar a este usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí,confirmar'
      }).then((result) => {
        if (result.isConfirmed) {
          /*Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )*/
          this.submit();
        }
      })
    })      
  </script>
@endsection

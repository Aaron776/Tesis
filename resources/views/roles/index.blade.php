    @extends('dash.index')
    @section('title','Roles y Permisos')
    @section('css')
        <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @endsection
    @section('contenido')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @can('crear-rol')
                            <div class="card-header">
                                 <a class="btn btn-info" href="{{route('roles.create')}}">Agregar Rol</a>
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
            
                            <table class="table table-striped table-hover" id="roles">
                                <thead>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="formEliminar"> 
                                                    @csrf
                                                    @method('DELETE')
                                              
                                                    @can('editar-rol')
                                                      <a class="btn btn-warning" href="{{route('roles.edit',$role->id)}}">Editar</a>
                                                    @endcan
                                                    @can('borrar-rol')
                                                      <button type="submit" class="btn btn-danger" class="formEliminar">Borrar</button>
                                                    @endcan 
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @endsection

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function(){
                if ($.fn.DataTable.isDataTable('#roles')) {
                    $('#roles').DataTable().destroy();
                }

                $('#roles').DataTable(
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
                    title: '¿Está seguro que desea eliminar a este rol?',
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
   
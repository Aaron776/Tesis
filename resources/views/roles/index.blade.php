    @extends('dash.index')
    @section('title','Roles')
    @section('css')
        <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    @endsection
    @section('contenido')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success text-center">
                                    {{Session::get('success')}} 
                                </div>
                            @endif
                            @can('crear-rol')
                                <a class="btn btn-primary" href="{{route('roles.create')}}">Agregar Nuevo Rol</a>
                                <br>
                                <br>
                            @endcan
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
                                                @can('editar-rol')
                                                    <a class="btn btn-warning" style="color:#fff;" href="{{route('roles.edit',$role->id)}}">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                    {!! Form::open(['method'=>'DELETE','route'=>['roles.destroy',$role->id], 'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!}
                            </div>
                            @section('js')
                                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                                <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
                                <script>
                                    $(document).ready(function(){
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
                            @endsection
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    @endsection
   
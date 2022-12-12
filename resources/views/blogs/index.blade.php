    @extends('dash.index')
    @section('title','Blogs')
    @section('contenido')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @can('crear-blog')
                                    <a class="btn btn-primary" href="{{route('blogs.create')}}">Agregar Nuevo Blog</a>
                                    <br>
                                    <br>
                                @endcan

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>Titulo</th>
                                        <th>Contenido</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td>{{$blog->titulo}}</td>
                                                <td>{{$blog->contenido}}</td>
                                                <td>
                                                    <form action="{{route('blogs.destroy',$blog->id)}}" method="POST">
                                                        @can('editar-blog')
                                                            <a class="btn btn-warning" href="{{route('blogs.edit',$blog->id)}}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-blog')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-end">
                                    {!! $blogs->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
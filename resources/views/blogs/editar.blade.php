@extends('dash.index')
@section('title','Editar Blogs')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                        <h1 style="text-align:center;">Editar Blog</h1>
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
    
    
                    <form action="{{ route('blogs.update',$blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Título</label>
                                   <input type="text" name="titulo" class="form-control" value="{{ $blog->titulo }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                                <div class="form-group">
                                <label for="contenido">Contenido</label>
                                <textarea class="form-control" name="contenido" style="height: 100px">{{ $blog->contenido }}</textarea>                                
                                
                                </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>







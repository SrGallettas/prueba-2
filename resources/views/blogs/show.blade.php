@extends('plantilla')
@section('titulo', 'Inicio')

@section('contenido')


<div class="container mt-5">

    <!-- Contenedor centrado con ancho limitado -->
    <div class="card mx-auto" style="max-width: 500px;">
        
        <!-- Imagen a medida, si no existe ninguna imagen pone una aleaoria del picsum (Sobretodo cuando hacemos el fresh seed, que no se quede vacío) --> 
        @if ($post->imagen)
            <img src="{{ asset('storage/' . $post->imagen) }}" class="card-img-top card-img-fixed"  alt="Imagen del post">
        @else
            <img src="https://picsum.photos/seed/{{ $post->id }}/600/400" class="card-img-top card-img-fixed" alt="Imagen aleatoria">
        @endif

        <div class="card-body">
            <h1 class="card-title mb-3">{{$post->titulo}}</h1>
            <p class="text-muted mb-4">Publicado el {{$post->created_at->format("d/m/Y")}}</p>
            <p class="text-muted mb-4">Creado por {{$post->usuario->login ?? ""}}</p>
            
            <p>
                {{$post->descripcion}}
            </p>
            <!-- Botón de volver -->
            <div class="d-flex gap-2 mb-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">&larr; Volver al blog</a>
                <!-- Editar y Eliminar solo si está autenticado -->
                @auth
                <!-- Si el usuario autenticado es el creador del blog, mostrar botones -->
                @if(auth()->id() === $post->id_usuario)
                <a href="{{ route('blogs.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                <!-- Eliminar Blog -->
                <form action="{{ route('blogs.destroy', $post->id) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-auto">Eliminar</button>
                </form>
                @endif
                @endauth
            </div>

        </div>
    </div>
</div>




@endsection
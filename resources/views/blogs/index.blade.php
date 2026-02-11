@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')

<br><br>

@auth 
<div class="alert alert-info text-center fw-bold fs-5"> 
    Bienvenido, {{ auth()->user()->login }} 
</div> 
@endauth
<!--Buscador -->
<div class="d-flex justify-content-center my-4"> 
    <form class="input-group w-50" method="GET" action="{{ route('blogs.search') }}"> 
        <input type="text" class="form-control" placeholder="Buscar post..." name="search" value="{{ $search ?? '' }}" > 
        <button class="btn btn-primary"> Buscar </button> 
    </form> 
</div>

@if(session()->has('mensaje'))
    <div class="alert alert-success" style="text-align:center">
        {{ session('mensaje') }}
    </div>
@endif

<div class="container mt-4">
    <div class="row">
        @forelse($posts as $post)
        <!-- Blog 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">      
                
                <!-- Imagen a medida, si no existe ninguna imagen pone una aleaoria del picsum (Sobretodo cuando hacemos el fresh seed, que no se quede vacío) --> 
                @if ($post->imagen)
                    <img src="{{ asset('storage/' . $post->imagen) }}" class="card-img-top card-img-fixed" alt="Imagen del post">
                @else
                    <img src="https://picsum.photos/seed/{{ $post->id }}/600/400" class="card-img-top card-img-fixed" alt="Imagen aleatoria">
                @endif
 
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titulo}}</h5>
                    <p class="card-text">
                        {{ $post->descripcion}}
                    </p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('blogs.show', $post->id) }}" class="btn btn-primary mt-auto">Leer más</a>
                        <!-- Botón de editar solo visible para usuarios autenticados -->
                        @auth
                        @if(auth()->id() === $post->id_usuario)
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
        @empty
        <h2 class="danger" style="text-align:center">No hay posts actualmete</h2>
        @endforelse
        <div class="my-4">
            {{ $posts->links()}}
        </div>
    </div>
</div>


@endsection


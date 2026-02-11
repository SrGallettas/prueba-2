@extends('plantilla')

@section('titulo', 'Editar post')

@section('contenido')

<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-8">

        <h1 class="text-center mb-4">Editar post</h1>

        <form action="{{ route('blogs.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="titulo" class="fw-bold">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old( "titulo", $post->titulo ?? "") }}">

                @error("titulo")
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="descripcion" class="fw-bold">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="5"> {{old("descripcion", $post->descripcion ?? "")}}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="imagen" class="fw-bold">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                @if ($errors->has('imagen'))
                    <div class="text-danger">{{ $errors->first('imagen') }}
                @endif
            </div>

            <div class="text-center">
                <input type="submit" value="Actualizar post" class="btn btn-dark px-4">
            </div>

            @error("descripcion")
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </form>
        

    </div>
</div>

@endsection

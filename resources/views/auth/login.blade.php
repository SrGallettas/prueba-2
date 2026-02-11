@extends('plantilla')

@section('titulo', 'Login')

@section('contenido')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow-lg" style="transform: scale(1.05);">
            <div class="card-header text-center bg-dark text-white py-4">
                <h3 class="mb-0">Iniciar sesión</h3>
            </div>

            <div class="card-body p-5">

                @error('login')
                    <div class="alert alert-danger text-center fs-5">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="login" class="form-label fs-5">Login</label>
                        <input type="text"
                               name="login"
                               id="login"
                               class="form-control form-control-lg"
                               value="{{ old('login') }}"
                               placeholder="Introduce tu login">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fs-5">Contraseña</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control form-control-lg"
                               placeholder="Introduce tu contraseña">
                    </div>

                    <div class="form-check mb-3"> 
                        <input class="form-check-input" type="checkbox" name="recordar" id="recordar"> 
                        <label class="form-check-label" for="recordar"> Recuérdame </label> 
                    </div> 

                    <button type="submit" class="btn btn-dark w-100 py-3 fs-5">
                        Entrar
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
